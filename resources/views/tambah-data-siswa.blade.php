<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-6xl">
        <h2 class="text-2xl font-semibold text-center mb-4">Tambah Data Siswa</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <div class="grid grid-cols-2 gap-6">
            <!-- Form Tambah Siswa -->
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-3">Tambah Siswa</h3>
                <form action="{{ route('siswa.tambah') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nisn" class="block font-medium">NISN</label>
                        <input type="text" id="nisn" name="nisn" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="block font-medium">Password</label>
                        <input type="password" id="password" name="password" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label for="nis" class="block font-medium">NIS</label>
                        <input type="text" id="nis" name="nis" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="block font-medium">Nama Siswa</label>
                        <input type="text" id="nama" name="nama" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="block font-medium">Alamat</label>
                        <input type="text" id="alamat" name="alamat" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label for="no_telp" class="block font-medium">No Telp</label>
                        <input type="text" id="no_telp" name="no_telp" required class="w-full p-2 border rounded-lg">
                    </div>

                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Tambah Siswa
                    </button>
                </form>
            </div>

            <!-- Daftar Siswa -->
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-3">Daftar Siswa</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">NISN</th>
                            <th class="border border-gray-300 p-2">NIS</th>
                            <th class="border border-gray-300 p-2">Nama</th>
                            <th class="border border-gray-300 p-2">Alamat</th>
                            <th class="border border-gray-300 p-2">No Telp</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="border border-gray-300 p-2 text-center">{{ $s->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $s->nisn }}</td>
                                <td class="border border-gray-300 p-2">{{ $s->nis }}</td>
                                <td class="border border-gray-300 p-2">{{ $s->nama }}</td>
                                <td class="border border-gray-300 p-2">{{ $s->alamat }}</td>
                                <td class="border border-gray-300 p-2">{{ $s->no_telp }}</td>
                                <td class="border border-gray-300 p-2 text-center">
                                    <a href="{{ route('siswa.edit', $s->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <button onclick="confirmDelete({{ $s->id }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">
                                        Hapus
                                    </button>
                                    <form id="delete-form-{{ $s->id }}" action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data siswa ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</body>
</html>
