<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    // Menampilkan form untuk tambah data SPP
    public function create()
    {
        return view('spp');  // Mengarah ke resources/views/spp.blade.php
    }

    // Menyimpan data SPP ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tahun' => 'required|integer|unique:spp,tahun',  // Validasi tahun agar unik
            'nominal' => 'required|integer|min:1',  // Validasi nominal
        ]);

        // Menyimpan data ke database
        $spp = new Spp();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('tambah.spp')->with('success', 'Data SPP berhasil ditambahkan.');
    }
}
