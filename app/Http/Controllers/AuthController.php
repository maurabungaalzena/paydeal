<?php
namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        // Debugging cek data input user
        //dd($request->all());

        $request->validate([
            'usn' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if ($request->role == 'petugas') {
            //? Login Petugas/Admin
            $petugas = Petugas::where('username', $request->usn)->first();

            // Pastikan petugas ditemukan dan password cocok
            if ($petugas && Hash::check($request->password, $petugas->password)) {
                Auth::guard('petugas')->login($petugas);
                $request->session()->regenerate();
                session(['role' => 'petugas']);

                return redirect()->route('dashboard_petugas');
            }

            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ])->onlyInput('username');
        }

        //? Login Siswa
        $siswa = Siswa::where('nisn', $request->usn)->first();

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
            $request->session()->regenerate();
            session(['role' => 'siswa']);

            return redirect()->route('dashboard_siswa');
        }

        return back()->withErrors([
            'nisn' => 'Username atau password salah.',
        ])->onlyInput('nisn');
    }

    public function logoutAdmin(Request $request): RedirectResponse
    {
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function logoutSiswa(Request $request): RedirectResponse
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}