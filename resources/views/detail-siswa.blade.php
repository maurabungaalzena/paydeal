<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
</head>
<body>
    <h1>Detail Siswa</h1>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $siswa->nama }}</td>
        </tr>
        <tr>
            <th>NIS</th>
            <td>{{ $siswa->nis }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $siswa->kelas->nama_kelas }}</td> <!-- Asumsi ada relasi dengan tabel kelas -->
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $siswa->tanggal_lahir }}</td>
        </tr>
        <!-- Tambahkan kolom lain sesuai dengan data siswa yang ada -->
    </table>

    <a href="{{ route('siswa.index') }}">Kembali</a>
</body>
</html>
