<nav class="nav bg-dark">
    @auth
        @if (auth()->user()->role == 'kasir')        
        <a href="/homeKasir" class="nav-link text-white"> Home </a>
        <a href="/report" class="nav-link text-white"> History </a>
        <a href="{{ route('logout') }}" class="nav-link text-white" onclick="return confirm('Yakin ingin logout?')"> Logout </a>
        @else
        <a href="{{ route('logout') }}" class="nav-link text-white" onclick="return confirm('Yakin ingin logout?')"> Logout </a>
        @endif
    @endauth
</nav>