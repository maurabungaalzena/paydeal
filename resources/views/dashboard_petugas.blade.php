<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
   
<nav>
    <ul>
        @if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->role == 'admin')
            <li><a href="{{ route('dashboard_petugas') }}">Dashboard Admin</a></li>
            <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('dashboard_petugas') }}">Dashboard Petugas</a></li>
            <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif
    </ul>
</nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
