<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Beranda') — Demala Brew</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- SIDEBAR USER (SEDERHANA) -->

<aside class="demala-admin-sidebar">

    <div class="demala-admin-brand">
        <div class="demala-admin-brand-icon">D</div>
        <div>
            <div class="demala-admin-brand-name">Demala Brew</div>
            <span class="demala-admin-brand-sub">Member Area</span>
        </div>
    </div>

    <div class="demala-admin-section">Menu</div>

    <a href="{{ route('dashboard') }}"
       class="demala-admin-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i>
        <span>Beranda</span>
    </a>

    <a href="{{ route('menu.index') }}" class="demala-admin-link">
        <i class="bi bi-journal-text"></i>
        <span>Semua Menu</span>
        <span class="demala-admin-count">{{ \App\Models\Menu::count() }}</span>
    </a>

    <a href="{{ url('/') }}" class="demala-admin-link">
        <i class="bi bi-box-arrow-up-right"></i>
        <span>Lihat Website</span>
    </a>

    <div class="demala-admin-bottom">
        <a href="{{ route('profile.edit') }}" class="demala-admin-user demala-admin-user-link" title="Edit profil">
            <div class="demala-admin-avatar">
                @if(Auth::user()->photo)
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto profil">
                @else
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                @endif
            </div>
            <div>
                <div class="demala-admin-user-name">{{ Auth::user()->name }}</div>
                <div class="demala-admin-user-role">Member</div>
            </div>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="demala-admin-logout">
                <i class="bi bi-box-arrow-left me-2"></i>
                Keluar
            </button>
        </form>
    </div>

</aside>

<div class="demala-admin-main">

    <header class="demala-admin-topbar">
        <h1 class="demala-admin-top-title">@yield('page_title', 'Beranda')</h1>
        <div class="demala-admin-top-right">
            <a href="{{ url('/') }}" class="demala-admin-view-site">
                Lihat Website <i class="bi bi-arrow-up-right"></i>
            </a>

            <a href="{{ route('profile.edit') }}" class="demala-topbar-profile" title="Profil Saya">
                <span class="demala-topbar-avatar">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto profil">
                    @else
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    @endif
                </span>
                <span class="demala-topbar-name">Profil Saya</span>
            </a>
        </div>
    </header>

    <main class="demala-admin-content">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>