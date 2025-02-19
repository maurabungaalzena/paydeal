<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-4 text-center">Form Pembayaran</h2>

        @if(session('success'))
            <p class="text-green-600 text-center">{{ session('success') }}</p>
        @endif

        <form action="{{ route('pembayaran.proses') }}" method="post" class="space-y-4">
            @csrf

            <div>
                <label for="id_petugas" class="block font-medium">ID Petugas</label>
                <input type="number" id="id_petugas" name="id_petugas" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="nisn" class="block font-medium">NISN</label>
                <input type="text" id="nisn" name="nisn" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="tanggal_bayar" class="block font-medium">Tanggal Bayar</label>
                <input type="date" id="tanggal_bayar" name="tanggal_bayar" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="bulan_dibayar" class="block font-medium">Bulan Bayar</label>
                <select id="bulan_dibayar" name="bulan_dibayar" required class="w-full p-2 border rounded-lg">
                    <option value="">Pilih Bulan</option>
                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tahun_dibayar" class="block font-medium">Tahun Bayar</label>
                <input type="number" id="tahun_dibayar" name="tahun_dibayar" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="id_spp" class="block font-medium">ID SPP</label>
                <input type="number" id="id_spp" name="id_spp" required class="w-full p-2 border rounded-lg">
            </div>

            <div>
                <label for="jumlah_bayar" class="block font-medium">Jumlah Bayar</label>
                <input type="number" id="jumlah_bayar" name="jumlah_bayar" required class="w-full p-2 border rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Selesai</button>
        </form>
    </div>
</body>
</html>
