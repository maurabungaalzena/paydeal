<nav>
    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
    <ul>
        @if(Auth::guard('petugas')->check())
            @if(Auth::guard('petugas')->user()->role == 'admin')
                <li><a href="{{ route('dashboard_petugas') }}">Dashboard Petugas</a></li>
                <li><a href="{{ route('dashboard_petugas') }}">Histori Pembayaran</a></li>
                <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
                <li><a href="{{ route('siswa.form') }}">Data Siswa</a></li>
                <li><a href="{{ route('petugas.form') }}">Data Petugas</a></li>
            @else
                {{-- Menu untuk petugas biasa --}}
                <li><a href="{{ route('dashboard_petugas') }}">Dashboard Petugas</a></li>
                <li><a href="{{ route('dashboard_petugas') }}">Histori Pembayaran</a></li>
                <li><a href="{{ route('pembayaran.form') }}">Form Pembayaran</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="border: none; background: none; color: white; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </li>
        @endif
    </ul>
</nav>
