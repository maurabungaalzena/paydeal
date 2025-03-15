<nav class="navbar">
        <div class="logo">
            <img src="/images/logo.jpg" alt="Logo" />
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
                <button type="submit" style="border: none; background: none; color: white; cursor: pointer;">
                    Logout
                </button>
        </form>
    </nav>

