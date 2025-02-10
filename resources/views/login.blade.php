<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo"  class="logo">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error-messages">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/login-siswa') }}" method="POST">
            @csrf
            <input type="text" name="nisn" placeholder="NISN" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <div class="options">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
            </div>

            <button type="submit">Login</button>
        </form>


        <p class="options">Don't have an account? <a href="#">Sign Up</a></p>
    </div>
</body>
</html>
