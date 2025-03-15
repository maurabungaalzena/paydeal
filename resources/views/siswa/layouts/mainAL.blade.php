<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <link href="{{ asset ('assets/css/siswa/navbarAL.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/siswa/dashboard.css') }}" rel="stylesheet">

    @include('siswa.components.navbar-Siswa')  

    {{-- Tempat untuk konten halaman --}}
    <main>
        @yield('containerdashboard')
    </main>
</body>
</html>
