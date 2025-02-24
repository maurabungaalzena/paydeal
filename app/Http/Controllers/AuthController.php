<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        $request->validate([
            'usn' => 'required',
            'password' => 'required',
        ]);

        if ($request->role == 'petugas') {
            //? Login Logic Buat Petugas/Admin
            $credentials = [
                'username' => $request->usn,
                'password' => $request->password,
            ];

            // $passBenar = Hash::make($credentials['password']);
            // $login = Petugas::where('password', $passBenar)->exists();
            // return $login;
            // if ($login) {
            //     $request->session()->regenerate();
            //     return redirect()->route('dashboard_petugas'); 
            // }

            //return $credentials
            $petugas = \App\Models\Petugas::where('username', $credentials['username'])->first();

            if (Auth::guard('petugas')->attempt($credentials)) {
                // Regenerate session
                $request->session()->regenerate();
        
                // Simpan role ke session (opsional)
                session(['role' => Auth::guard('petugas')->user()->role]);
        
                // Redirect ke dashboard petugas
                return redirect()->route('dashboard_petugas');
            }
        
            
            

            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        }

        //? Login Logic Buat Siswa
        $credentials = [
            'nisn' => $request->usn,
            'password' => $request->password,
        ];

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            // Simpan role siswa ke session
            session(['role' => 'siswa']);

            return redirect()->intended(route('dashboard_siswa'));
        }

        return back()->withErrors([
            'nisn' => 'The provided credentials do not match our records.',
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