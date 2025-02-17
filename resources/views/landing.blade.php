<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembayaran SPP</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #0047ab;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .info-box {
            background-color: #eef1f7;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            text-align: left;
            font-size: 16px;
            border-left: 5px solid #0047ab;
        }

        .status {
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .status-lunas {
            background: #d4edda;
            color: #155724;
        }

        .status-belum {
            background: #f8d7da;
            color: #721c24;
        }

        .button {
            display: inline-block;
            background: #0047ab;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .button:hover {
            background: #003366;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #0047ab;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
        }

        button:hover {
            background: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Dashboard Pembayaran SPP</h1>
        <div class="info-box">
            <p><strong>Nama:</strong> {{ $namaSiswa ?? 'Tidak Diketahui' }}</p>
            <p><strong>Kelas:</strong> {{ $kelas ?? 'Tidak Diketahui' }}</p>
            <p><strong>Periode:</strong> {{ $periode ?? 'Tidak Diketahui' }}</p>
            <p><strong>Jumlah Tagihan:</strong> Rp{{ number_format($jumlahTagihan ?? 0, 0, ',', '.') }}</p>
            <p><strong>Status:</strong>
                <span class="status {{ ($statusPembayaran ?? '') == 'Lunas' ? 'status-lunas' : 'status-belum' }}">
                    {{ ($statusPembayaran ?? 'Belum Lunas') }}
                </span>
            </p>
        </div>

        <h2>📋 Riwayat Pembayaran</h2>
        @if (!empty($riwayatPembayaran) && count($riwayatPembayaran) > 0)
            <div class="info-box">
                <ul>
                    @foreach ($riwayatPembayaran as $pembayaran)
                        <li>
                            {{ $pembayaran['tanggal'] }} -
                            Rp{{ number_format($pembayaran['jumlah'], 0, ',', '.') }} -
                            {{ $pembayaran['status'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>Belum ada riwayat pembayaran.</p>
        @endif

        <h2>📝 Form Pembayaran</h2>
        <form action="/pembayaran" method="post">
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
            </div>

            <div class="form-group">
                <label for="bulan">Bulan Bayar:</label>
                <input type="text" id="bulan" name="bulan" placeholder="Masukkan Bulan" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun Bayar:</label>
                <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Bayar:</label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" required>
            </div>

            <button type="submit">Selesaikan Pembayaran</button>
        </form>

        <p><a href="/siswa" class="button">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>
