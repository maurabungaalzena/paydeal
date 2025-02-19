    <nav class="navbar">
        <div class="logo">
            <img src="/images/logo.jpg" alt="Logo" />
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('siswa.login') }}" class="sign-in">Sign In</a>
        </div>
    </nav>

