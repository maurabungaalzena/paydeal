@include('layouts.main')

@section('title', 'Dashboard - PayDeal')

@section('containerdashboard')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Selamat Datang di Dashboard Petugas</h2>
    <p class="text-center">Anda dapat mengelola pembayaran SPP dan melihat histori transaksi di sini.</p>

    <h3>Informasi Petugas</h3>
    <a href="{{ route('petugas.form') }}" class="btn btn-primary mb-3">Tambah Petugas</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usename</th>
                <th>Nama Petugas</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\Petugas::all() as $petugas)
                <tr>
                    <td>{{ $petugas->id }}</td>
                    <td>{{ $petugas->username }}</td>
                    <td>{{ $petugas->nama_petugas }}</td>
                    <td>{{ $petugas->role }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
