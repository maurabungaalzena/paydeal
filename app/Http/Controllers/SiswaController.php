<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Siswa;

use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
        public function loginSiswa()
    {
        return view('siswa.page.login.login'); // Sesuaikan dengan path file login.blade.php
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


    // Menampilkan form tambah siswa
    public function showForm()
    {
        $siswa = Siswa::all();
        return view('tambah-data-siswa', compact('siswa'));
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('detail-siswa', compact('siswa'));
    }


    // Proses tambah siswa
    public function tambahSiswa(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'password' => 'required|min:6',
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|numeric',
            'id_kelas' => 'required|exists:kelas,id',
            'id_spp' => 'required|exists:spp,id',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_kelas' => $request->id_kelas,
            'id_spp' => $request->id_spp,
        ]);

        return redirect()->route('siswa.form')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('edit-siswa', compact('siswa'));
    }

    // Proses update data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn,' . $id,
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|numeric',
            'id_kelas' => 'required|exists:kelas,id',
            'id_spp' => 'required|exists:spp,id',
            'password' => 'nullable|min:6',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_spp = $request->id_spp;

        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->save();

        return redirect()->route('siswa.form')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Proses hapus siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
    }

}
