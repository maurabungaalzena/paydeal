<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/css/admin/editPetugas.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">

        <h2 class="text-2xl font-semibold mb-4 text-center">Edit Petugas</h2>

        @if(session('success'))
            <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('update.petugas', $petugas->id) }}" method="POST">
            @csrf
            @method('POST')

            <div>
                <label for="username" class="block font-medium">Username</label>
                <input type="text" id="username" name="username" value="{{ $petugas->username }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="password" class="block font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="nama_petugas" class="block font-medium">Nama Petugas</label>
                <input type="text" id="nama_petugas" name="nama_petugas" value="{{ $petugas->nama_petugas }}" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="role" class="block font-medium">Role</label>
                <select id="role" name="role" required class="w-full p-2 border rounded-lg">
                    <option value="admin" {{ $petugas->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ $petugas->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#001F3F] text-white py-2 rounded-lg hover:bg-[#003366]">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>
</html>
