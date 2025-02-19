<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    // Menampilkan form pembayaran
    public function showForm()
    {
        return view('form-pembayaran');
    }

    // Memproses penyimpanan data pembayaran ke database
    public function prosesPembayaran(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_petugas' => 'required|exists:petugas,id',
            'nisn' => 'required|exists:siswa,nisn',
            'tanggal_bayar' => 'required|date',
            'bulan_dibayar' => 'required|string',
            'tahun_dibayar' => 'required|integer',
            'id_spp' => 'required|exists:spp,id',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        // Simpan data ke database
        Pembayaran::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.form')->with('success', 'Pembayaran berhasil disimpan.');
    }
}
