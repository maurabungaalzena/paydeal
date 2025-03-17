@include('siswa.layouts.mainAL')

@section('title', 'Dashboard siswa - PayDeal')

@section('containerdashboard')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Siswa</title>
</head>
<body>
<table class="table table-striped">
    <h2 class="mb-4 text-center heading judul-atas">Dashboard Siswa</h2>
<div class="container mt-5">

    <!-- Menampilkan Total Pembayaran -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="cash">Total Pembayaran: Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h4>
            <h4 class="cash">Sisa Pembayaran: Rp {{ number_format($sisaPembayaran, 0, ',', '.') }}</h4>
        </div>
    </div>

    <!-- Tabel Pembayaran -->
    <table class="table table-striped">
        <h1 class="history">History Pembayaran Siswa</h1>
        <hr>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pembayaran</th>
                <th>Petugas</th>
                <th>NISN</th>
                <th>Tanggal Bayar</th>
                <th>Periode</th>
                <th>ID SPP</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->petugas->nama ?? '-' }}</td>
                    <td>{{ $data->nisn }}</td>
                    <td>{{ date('d-m-Y', strtotime($data->tanggal_bayar)) }}</td>
                    <td>{{ $data->bulan_dibayar }} {{ $data->tahun_dibayar }}</td>
                    <td>{{ $data->id_spp }}</td>
                    <td>Rp {{ number_format($data->jumlah_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
