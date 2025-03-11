@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Pembayaran - {{ $siswa->nama }}</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal Bayar</th>
                <th>Bulan Dibayar</th>
                <th>Tahun Dibayar</th>
                <th>Jumlah</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayaran as $data)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal_bayar)->format('d M Y') }}</td>
                    <td>{{ $data->bulan_dibayar }}</td>
                    <td>{{ $data->tahun_dibayar }}</td>
                    <td>Rp{{ number_format($data->jumlah_bayar, 2, ',', '.') }}</td>
                    <td>{{ $data->petugas->nama }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pembayaran</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
