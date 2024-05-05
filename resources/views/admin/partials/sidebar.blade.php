<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <head>
            <!-- Skrip Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        </head>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::check() && Auth::user()->id_role == '1')

        <li class="nav-item">
            <a class="nav-link" href="/buku">
                <i class="fas fa-book menu-icon"></i>
                <span class="menu-title">Data Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kategori">
                <i class="fas fa-list-alt menu-icon"></i>
                <span class="menu-title">Master Data</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pengguna">
                <i class="fas fa-user menu-icon"></i>
                <span class="menu-title">Anggota</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/peminjaman">
                <i class="fas fa-handshake menu-icon"></i>
                <span class="menu-title">Peminjaman</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/denda">
                <i class="fas fa-money-bill menu-icon"></i>
                <span class="menu-title">Denda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pengaturan">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Pengaturan</span>
            </a>
        </li>
        @else

        <li class="nav-item">
            <a class="nav-link" href="/user/peminjaman">
                <i class="fas fa-handshake menu-icon"></i>
                <span class="menu-title">Peminjaman</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
