<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <link href="{{ asset ('assets/css/admin/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin/dashboardpetugas.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    @include('components.navbar')
    @yield('containerdashboard-1')
</body>
</html>
