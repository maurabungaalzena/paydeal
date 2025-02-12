<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    // Menampilkan halaman login operator
    public function loginOperator()
    {
        return view('operator_login'); // Pastikan file ini ada di resources/views
    }

    // Proses login operator
    public function signinOperator(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah user bisa login dengan guard petugas
        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('petugas')->user();

            // Redirect berdasarkan role
            return $user->role === 'admin'
                ? redirect()->route('dashboard_admin')
                : redirect()->route('dashboard_petugas');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Logout
    public function logoutOperator(Request $request)
    {
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('operator.login');
    }
}
