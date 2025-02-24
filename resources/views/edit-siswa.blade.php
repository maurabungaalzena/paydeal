<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-semibold mb-4 text-center">Edit Siswa</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('update.siswa', $siswa->id) }}" method="POST">
            @csrf
            @method('POST')

            <div>
                <label for="nisn" class="block font-medium">NISN</label>
                <input type="text" id="nisn" name="nisn" value="{{ $siswa->nisn }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="nis" class="block font-medium">NIS</label>
                <input type="text" id="nis" name="nis" value="{{ $siswa->nis }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="password" class="block font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="nama" class="block font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="alamat" class="block font-medium">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ $siswa->alamat }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="no_telp" class="block font-medium">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp" value="{{ $siswa->no_telp }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="id_kelas" class="block font-medium">Kelas</label>
                <input type="text" id="id_kelas" name="id_kelas" value="{{ $siswa->id_kelas }}" readonly class="w-full p-2 border rounded-lg bg-gray-200">
            </div>

            <div>
                <label for="id_spp" class="block font-medium">SPP</label>
                <input type="text" id="id_spp" name="id_spp" value="{{ $siswa->id_spp }}" required class="w-full p-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>
</html>
