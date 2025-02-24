<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <style>
        /* CSS Styling */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; color: #333; }
        .container { background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); padding: 40px; width: 350px; text-align: center; }
        h1 { font-size: 28px; font-weight: 600; color: #1e88e5; margin-bottom: 20px; }
        label { font-size: 14px; font-weight: 500; color: #555; margin-bottom: 8px; text-align: left; display: block; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 12px 15px; font-size: 16px; margin-bottom: 15px; border: 2px solid #ddd; border-radius: 8px; transition: all 0.3s ease; }
        input[type="text"]:focus, input[type="number"]:focus, select:focus { border-color: #1e88e5; outline: none; }
        button { width: 100%; padding: 12px; background-color: #1e88e5; color: white; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.3s ease; }
        button:hover { background-color: #1565c0; }
        .error { color: #e53935; font-size: 12px; margin-top: -10px; margin-bottom: 10px; }
        .success { color: #43a047; font-size: 14px; margin-bottom: 20px; }
        a { color: #1e88e5; text-decoration: none; font-size: 14px; margin-top: 10px; display: inline-block; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Pembayaran</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('entri.pembayaran.store') }}" method="POST">
            @csrf

            <!-- NISN -->
            <div>
                <label for="nisn">NISN:</label>
                <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}">
                @error('nisn')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bulan Dibayar -->
            <div>
                <label for="bulan_dibayar">Bulan Dibayar:</label>
                <input type="text" name="bulan_dibayar" id="bulan_dibayar" value="{{ old('bulan_dibayar') }}">
                @error('bulan_dibayar')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tahun Bayar -->
            <div>
                <label for="tahun_bayar">Tahun Bayar:</label>
                <input type="number" name="tahun_bayar" id="tahun_bayar" value="{{ old('tahun_bayar') }}">
                @error('tahun_bayar')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jumlah Bayar -->
            <div>
                <label for="jumlah_bayar">Jumlah Bayar:</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" value="{{ old('jumlah_bayar') }}">
                @error('jumlah_bayar')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <button type="submit">Simpan Pembayaran</button>
        </form>

        <a href="{{ url('/') }}">Kembali</a>
    </div>
</body>
</html>
