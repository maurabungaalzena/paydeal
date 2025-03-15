<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;

class PembayaranController extends Controller
{
    // Menampilkan form pembayaran
    public function showForm()
    {
        $petugas = Petugas::all();
        $siswa = Siswa::all();
        $spp = Spp::all();

        return view('form-pembayaran', compact('petugas', 'siswa', 'spp'));
    }

    // Memproses pembayaran
    public function prosesPembayaran(Request $request)
    {
        $request->validate([
            'id_petugas' => 'required|exists:petugas,id',
            'nisn' => 'required|exists:siswa,nisn',
            'id_spp' => 'required|exists:spp,id',
            'tgl_bayar' => 'required|date',
            'bulan_dibayar' => 'required|string',
            'tahun_dibayar' => 'required|integer',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        $pembayaran = Pembayaran::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'id_spp' => $request->id_spp,
            'tanggal_bayar' => $request->tgl_bayar,
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
           'jumlah_bayar' => (int) str_replace(['.', ','], '', $request->jumlah_bayar),
        ]);

        if (!$pembayaran) {
            return back()->with('error', 'Gagal menyimpan data');
        }

        return redirect()->route('pembayaran.form')->with('success', 'Pembayaran berhasil disimpan.');
    }

    // Menampilkan dashboard siswa dengan total dan sisa pembayaran
    public function index()
    {
        $pembayaran = Pembayaran::with('petugas', 'siswa', 'spp')->get();

        // Hitung total pembayaran
        $totalPembayaran = $pembayaran->sum('jumlah_bayar');

        // Ambil total biaya SPP
        $totalSPP = Spp::sum('nominal');

        // Hitung sisa pembayaran
        $sisaPembayaran = max(0, $totalSPP - $totalPembayaran);

        return view('siswa.page.dashboard.dashboard_siswa', compact('pembayaran', 'totalPembayaran', 'sisaPembayaran'));
    }

    public function history($nisn)
{
    $siswa = Siswa::where('nisn', $nisn)->firstOrFail();
    $pembayaran = Pembayaran::where('nisn', $nisn)->orderBy('tanggal_bayar', 'desc')->get();

    return view('siswa.page.history', compact('siswa', 'pembayaran'));
}

} 
