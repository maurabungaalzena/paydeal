<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset ('assets/css/siswa/login.css') }}" rel="stylesheet">
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

        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <input type="text" name="usn" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <select required class="form-select input form-control" name="role" id="role">
                <option value="" disabled selected>Pilih Peran</option>
                <option value="siswa">Siswa</option>
                <option value="petugas">Petugas</option>
            </select>

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
