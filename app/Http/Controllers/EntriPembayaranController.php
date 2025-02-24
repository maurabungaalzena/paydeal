<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntriPembayaranController extends Controller
{
    // Menampilkan form untuk tambah pembayaran
    public function create()
    {
        return view('entri-pembayaran');
    }

    // Menyimpan data pembayaran ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|numeric',
            'bulan_dibayar' => 'required|string|max:255', // Ganti bulan_bayar menjadi bulan_dibayar
            'tahun_dibayar' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
        ]);

        // Simpan data pembayaran ke database
        Pembayaran::create([
            'nisn' => $request->nisn,
            'bulan_dibayar' => $request->bulan_dibayar, // Ganti bulan_bayar menjadi bulan_dibayar
            'tahun_dibayar' => $request->tahun_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'id_petugas' => Auth::id(),
            'id_spp' => rand(1, 100),
            'tanggal_bayar' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('entri.pembayaran.create')->with('success', 'Pembayaran berhasil disimpan');
    }
}
