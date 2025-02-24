<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data SPP</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #1e88e5;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            text-align: left;
            display: block;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, select:focus {
            border-color: #1e88e5;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1e88e5;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1565c0;
        }

        .error {
            color: #e53935;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .success {
            color: #43a047;
            font-size: 14px;
            margin-bottom: 20px;
        }

        a {
            color: #1e88e5;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data SPP</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('spp.store') }}" method="POST">
            @csrf
            <div>
                <label for="tahun">Tahun:</label>
                <input type="text" name="tahun" id="tahun" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="nominal">Nominal:</label>
                <input type="text" name="nominal" id="nominal" value="{{ old('nominal') }}">
                @error('nominal')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="semester">Semester:</label>
                <select name="semester" id="semester">
                    <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                    <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                </select>
                @error('semester')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ url('/') }}">Kembali</a>
    </div>
</body>
</html>
