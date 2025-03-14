<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/css/admin/tambah-petugas.css') }}" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="p-6 rounded-lg shadow-lg">
        <a href="javascript:history.back()" class="back-button">← Back</a>
        <h2 class="text-2xl font-semibold text-center mb-4">Manajemen Petugas</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <div class="container grid grid-cols-2 gap-6">
            <!-- Form Tambah Petugas -->
            <div class="container-tp p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-3">Tambah Petugas</h3>
                <form action="{{ route('tambah.petugas') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="block text-gray-700">Username</label>
                        <input type="text" id="username" name="username" required
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="nama_petugas" class="block text-gray-700">Nama Petugas</label>
                        <input type="text" id="nama_petugas" name="nama_petugas" required
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="block text-gray-700">Role</label>
                        <select id="role" name="role" required
                            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600 transition"  class="edit-button">
                        Tambah Petugas
                    </button>

                </form>
            </div>

            <!-- Daftar Petugas -->
            <div class="p-4 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-3">Daftar Petugas</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Username</th>
                            <th class="border border-gray-300 p-2">Nama Petugas</th>
                            <th class="border border-gray-300 p-2">Role</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $p)
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="border border-gray-300 p-2 text-center">{{ $p->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $p->username }}</td>
                                <td class="border border-gray-300 p-2">{{ $p->nama_petugas }}</td>
                                <td class="border border-gray-300 p-2 text-center capitalize">{{ $p->role }}</td>
                                <td class="border border-gray-300 p-2 text-center">

                                    <div class="flex items-center space-x-2 justify-center">
                                        <a href="{{ route('edit.petugas', $p->id) }}"
                                            class="btn-action bg-blue-500 hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('hapus.petugas', $p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action bg-red-500 hover:bg-red-600"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus petugas ini?');">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
