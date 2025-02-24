<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data SPP</title>
</head>
<body>
    <h1>Tambah Data SPP</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('spp.create') }}" method="POST">
        @csrf
        <div>
            <label for="tahun">Tahun:</label>
            <input type="text" name="tahun" id="tahun" value="{{ old('tahun') }}">
            @error('tahun')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nominal">Nominal:</label>
            <input type="text" name="nominal" id="nominal" value="{{ old('nominal') }}">
            @error('nominal')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ url('/') }}">Kembali</a>
</body>
</html>
