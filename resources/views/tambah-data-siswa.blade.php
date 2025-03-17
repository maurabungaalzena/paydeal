@include('layouts.main')

@section('title', 'Dashboard - PayDeal')

@section('containerdashboard')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/css/admin/tambah-siswa.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container p-6 rounded-lg shadow-lg w-full max-w-6xl">
        <h2 class="text-2xl font-semibold text-center mb-4 add-student">Tambah Data Siswa</h2>
        <hr>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <div class="grid grid-cols-1 gap-4">
            <!-- Form Tambah Siswa -->
            <div class="bg-gray-50 p-4 rounded-lg shadow border-siswa container">
                <h3 class="text-xl font-semibold mb-3 add-student">Tambah Siswa</h3>
                <hr>
                <form action="{{ route('tambah.siswa') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="block font-medium">NISN</label>
                        <input type="text" name="nisn" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">Password</label>
                        <input type="password" name="password" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">NIS</label>
                        <input type="text" name="nis" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">Nama Siswa</label>
                        <input type="text" name="nama" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">Alamat</label>
                        <input type="text" name="alamat" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">No Telp</label>
                        <input type="text" name="no_telp" required class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">Kelas</label>
                        <select name="id_kelas" required class="w-full p-2 border rounded-lg">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium">SPP</label>
                        <select name="id_spp" required class="w-full p-2 border rounded-lg">
                            <option value="">-- Pilih SPP --</option>
                            @foreach($spp as $s)
                                <option value="{{ $s->id }}">{{ $s->tahun }} - Rp{{ number_format($s->nominal, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Tambah Siswa
                    </button>
                </form>
            </div>

            <!-- Daftar Siswa -->
            <div class="bg-gray-50 p-4 rounded-lg shadow border-siswa container">
                <h3 class="text-xl font-semibold mb-3 add-student">Daftar Siswa</h3>
                <hr>
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
                                    <a href="{{ route('siswa.edit', $s->id) }}" class="bg-blue-500 text-white px-1 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <a onclick="confirmDelete({{ $s->id }})" class="bg-red-500 text-white px-1 py-1 rounded hover:bg-red-600 ml-2">
                                        Hapus
                                    </a>
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
