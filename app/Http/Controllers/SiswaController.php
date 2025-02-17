<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function loginSiswa() {
        return view('login_siswa'); // Sesuai dengan lokasi file views
    }

    // FUNGSI LOGIN

    public function signinSiswa(Request $request) {
        $credentials = $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard_siswa');
        }

        return back()->withErrors([
            'nisn' => 'NISN atau password salah.',
        ])->onlyInput('nisn');
    }

    // FUNGSI KE HALAMAN REGISTER
    public function registerSiswa() {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.register',[
            'kelas' => $kelas,
            'spp' => $spp
        ]);
    }


    public function signupSiswa(Request $request) {
        $request->validate([
            'nisn' => ['required'],
            'nis' => ['required'],
            'nama' => ['required'],
            'id_kelas' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
            'id_spp' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->password = Hash::make($request->password);
        $siswa->save();

        return back()->with('success', 'Berhasil Membuat Data Siswa Baru');
    }

}
