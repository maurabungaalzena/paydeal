<nav>
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo"  class="logo">
    <ul>
        @if(Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->role == 'admin')
            <li><a href="{{ route('dashboard_petugas') }}">Dashboard Petugas</a></li>
            <li><a href="{{ route('dashboard_petugas') }}">Histori Pembayaran</a></li>
            <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('dashboard_petugas') }}">Dashboard Petugas</a></li>
            <li><a href="{{ route('dashboard_petugas') }}">Histori Pembayaran</a></li>
            <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
            <li><a href="{{ route('siswa.form') }}">Data Siswa</a></li>
            <li><a href="{{ route('petugas.form') }}">Data Petugas</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @endif
    </ul>
</nav>
