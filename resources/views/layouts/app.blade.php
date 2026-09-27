<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Demala Brew & Dine Society')</title>

    <meta name="description" content="@yield('meta_description', 'Demala Brew & Dine Society — kafe dan tempat nongkrong di Pekanbaru untuk kerja, meeting, atau sekadar bersantai. Kopi racikan, hidangan rumahan, dan suasana yang bikin betah.')">

    <!-- Open Graph (preview saat link dishare) -->
    <meta property="og:title" content="@yield('title', 'Demala Brew & Dine Society')">
    <meta property="og:description" content="@yield('meta_description', 'Kafe dan tempat nongkrong di Pekanbaru untuk kerja, meeting, atau sekadar bersantai.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/images/demala-malam.webp') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Custom CSS (file terpisah) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg dbds-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand dbds-brand" href="{{ url('/') }}">
                <span class="dbds-brand-mark">D</span>
                <span class="dbds-brand-text">
                    Demala Brew <span class="dbds-brand-thin">&amp; Dine Society</span>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <ul class="navbar-nav align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                    </li>

                    {{-- ===== LOGIN / DASHBOARD =====
                         Kalau belum login: tombol "Login" (satu-satunya, tidak ada
                         tulisan "Login Admin" di mana pun).
                         Kalau sudah login: tombol "Dashboard" yang otomatis
                         mengarah ke /admin/dashboard (admin) atau /dashboard (user). --}}
                    <li class="nav-item ms-lg-2">
                        @auth
                            <a class="btn dbds-btn-nav-login btn-sm"
                               href="{{ Auth::user()->role === 'admin' ? url('/admin/dashboard') : url('/dashboard') }}">
                                Dashboard
                            </a>
                        @else
                            <a class="btn dbds-btn-nav-login btn-sm" href="{{ route('login') }}">
                                Login
                            </a>
                        @endauth
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn dbds-btn-brass btn-sm" href="{{ url('/kontak') }}">Reservasi Meja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== MAIN CONTENT ===== -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <!-- ===== FOOTER ===== -->
<footer class="dbds-footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="dbds-brand mb-3">
                    <span class="dbds-brand-mark dbds-brand-mark-light">D</span>
                    <span class="dbds-brand-text text-light">
                        Demala Brew <span class="dbds-brand-thin">&amp; Dine Society</span>
                    </span>
                </div>
                <p class="dbds-footer-text">
                    Ruang singgah untuk secangkir kopi yang jujur dan hidangan yang dimasak dengan hati,
                    di tengah hari yang serba cepat.
                </p>
                <div class="dbds-footer-social">
                    <a href="https://instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@demala.society?is_from_webapp=1&sender_device=pc/" target="_blank" rel="noopener" aria-label="tiktok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://wa.me/6285110566398" target="_blank" rel="noopener" aria-label="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="mailto:demalasisingamangarajapku@gmail.com" aria-label="Email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-6 dbds-footer-col">
                <h6 class="dbds-footer-title">Jelajah</h6>
                <ul class="list-unstyled dbds-footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/menu') }}">Menu</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang</a></li>
                    <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6 dbds-footer-col">
                <h6 class="dbds-footer-title">Jam Buka</h6>
                <ul class="list-unstyled dbds-footer-links">
                    <li>Senin – Minggu &nbsp; 08.00 – 04.00</li>
                </ul>
            </div>

            <div class="col-lg-3 dbds-footer-col">
                <h6 class="dbds-footer-title">Hubungi Kami</h6>
                <ul class="list-unstyled dbds-footer-links">
                    <li><i class="bi bi-geo-alt"></i> Jl. Sisingamangaraja No.102, Rintis, Pekanbaru Kota, Kota Pekanbaru, Riau 28156</li>
                    <li><i class="bi bi-telephone"></i> +62 851-1056-6398</li>
                    <li><i class="bi bi-envelope"></i> demalasisingamangarajapku@gmail.com</li>
                </ul>
            </div>
        </div>
        <hr class="dbds-footer-divider">
        <p class="text-center dbds-footer-copy mb-0">
            &copy; {{ date('Y') }} Demala Brew &amp; Dine Society. Seluruh hak cipta dilindungi.
        </p>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>