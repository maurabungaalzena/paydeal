<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landing extends Controller
{
    public function show()
    {
        return view('landing');

        $data = [
            'nama' => 'John Doe',
            'kelas' => 'XII IPA 1',
            'periode' => 'Januari 2025',
            'jumlahTagihan' => 500000,
            'statusPembayaran' => 'Belum Lunas',
            'riwayatPembayaran' => [
                ['tanggal' => '2025-01-01', 'jumlah' => 250000, 'status' => 'Lunas'],
            ]
        ];

        return view('landing', $data);
    }
}
