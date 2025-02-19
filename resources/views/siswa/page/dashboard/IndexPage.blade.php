@include('siswa.layouts.mainL')
@section('containerdashboard')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h3>Welcome Everyone to</h3>
        <h1 class="paydeal-text">PayDeal</h1>
        <div class="money-image">
            <img src="/images/money.jpg" alt="Money Logo">
        </div>
    </header>
    <main>
        <div class="container">
            <div class="features">
                <div class="feature">
                    <h3>Fleksibilitas & Aksesibilitas</h3>
                    <p>Bisa Diakses Kapan Saja, siswa bisa melakukan pembayaran dari rumah tanpa harus ke sekolah.
                    Multi-User, bisa digunakan oleh staf keuangan sekolah dan siswa dengan akses berbeda.</p>
                </div>
                <div class="feature">
                    <h3>Transparansi & Akuntabilitas</h3>
                    <p>Riwayat Pembayaran Jelas, Orang tua dan siswa bisa melihat histori pembayaran kapan saja.
                    Laporan Keuangan Otomatis, sekolah bisa langsung mengakses laporan keuangan tanpa perlu rekap manual.</p>
                </div>
                <div class="feature">
                    <h3>Efisiensi Administrasi</h3>
                    <p>Otomatisasi Data, Mengurangi beban kerja administrasi sekolah dengan pencatatan pembayaran secara otomatis.
                    Hemat Waktu, Tidak perlu mencatat secara manual, cukup input atau scan bukti pembayaran.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
