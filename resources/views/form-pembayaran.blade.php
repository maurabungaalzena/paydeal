<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
</head>
<body>
    <h2>Form Pembayaran</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('pembayaran.proses') }}" method="POST">
        @csrf

        <!-- Pilih Petugas -->
        <label for="id_petugas">Petugas:</label>
        <select name="id_petugas" id="id_petugas" required>
            @foreach($petugas as $p)
                <option value="{{ $p->id }}">{{ $p->nama_petugas }}</option>
            @endforeach
        </select>
        <br>

        <!-- Pilih Siswa -->
        <label for="nisn">Siswa:</label>
        <select name="nisn" id="nisn" required>
            @foreach($siswa as $s)
                <option value="{{ $s->nisn }}">{{ $s->nisn }} - {{ $s->nama }}</option>
            @endforeach
        </select>
        <br>

        <!-- Pilih SPP -->
        <label for="id_spp">SPP:</label>
        <select name="id_spp" id="id_spp" required>
            @foreach($spp as $s)
                <option value="{{ $s->id }}">{{ $s->tahun }} - Rp{{ number_format($s->nominal) }}</option>
            @endforeach
        </select>
        <br>

        <!-- Input Data Lain -->
        <label for="tgl_bayar">Tanggal Bayar:</label>
        <input type="date" name="tgl_bayar" required>
        <br>

        <label for="bulan_dibayar">Bulan Dibayar:</label>
        <input type="text" name="bulan_dibayar" required>
        <br>

        <label for="tahun_dibayar">Tahun Dibayar:</label>
        <input type="number" name="tahun_dibayar" required>
        <br>

        
        <label for="jumlah_bayar">Jumlah Bayar:</label>
        <input type="number" name="jumlah_bayar" required>
        <br>

        <button type="submit">Bayar</button>
    </form>
</body>
</html>
