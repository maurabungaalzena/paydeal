    <nav class="navbar">
        <div class="logo">
            <img src="/images/logo.jpg" alt="Logo" />
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('siswa.page.dashboard.IndexPage') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('siswa.login') }}" class="sign-in">Sign In</a>
        </div>
    </nav>

