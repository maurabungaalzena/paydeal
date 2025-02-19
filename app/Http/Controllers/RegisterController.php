<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); 
    }


    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'role' => 'required|in:admin,petugas',
        ]);

        $petugas = new Petugas(); // ✅ Ubah variabel dari $Petugas ke $petugas
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password); // ✅ Hash password agar aman
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->role = $request->role;
        $petugas->save();

        return redirect()->route('operator.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
