<nav class="navbar navbar-expand-lg fixed-top p-3" style="background-color: #25364F; color: white;">
    @auth
        @if (auth()->user()->role == 'kasir')        
        <img src="img/logo.png" alt="" width="100px">
        <a href="/homeKasir" class="nav-link text-white"> Home </a>
        <a href="/report" class="nav-link text-white"> Report </a>
        <a href="{{ route('logout') }}" class="nav-link text-white" onclick="return confirm('Yakin ingin logout?')"> Logout </a>
        @endif
        @if (auth()->user()->role == 'admin')
            <img src="img/logo.png" alt="" width="100px">
            <a href="{{ route('tambahPaket') }}" class="nav-link text-white"> Tambah Paket </a>
            <a href="{{ route('tambahKasir') }}" class="nav-link text-white"> Lihat User </a>
            <a href="{{ route('tambahVoucher') }}" class="nav-link text-white"> Tambah Voucher </a>
            <a href="{{ route('logout') }}" class="nav-link text-white" onclick="return confirm('Yakin Logout?')"> Logout </a>
        @endif
        @if (auth()->user()->role === 'owner')
            <img src="img/logo.png" alt="" width="100px">
            <a href="{{ route('logout') }}" class="nav-link text-white" onclick="return confirm('Yakin ingin logout?')"> Logout </a>
        @endif
    @endauth
</nav>