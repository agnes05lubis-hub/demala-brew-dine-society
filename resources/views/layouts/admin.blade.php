<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin') — Demala Brew</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

@php
    $onMenu = request()->routeIs('admin.menu.*');
    $cat = request('category');

    $dashUrl = Route::has('dashboard')
        ? route('dashboard')
        : url('/dashboard');
@endphp

<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="demala-admin-sidebar">

    <div class="demala-admin-brand">

        <div class="demala-admin-brand-icon">
            D
        </div>

        <div>
            <div class="demala-admin-brand-name">
                Demala Brew
            </div>

            <span class="demala-admin-brand-sub">
                Admin Panel
            </span>
        </div>

    </div>


    <!-- UTAMA -->

    <div class="demala-admin-section">
        Utama
    </div>

    <a href="{{ $dashUrl }}"
       class="demala-admin-link {{ request()->is('dashboard') ? 'active' : '' }}">

        <i class="bi bi-grid-1x2"></i>

        <span>Dashboard</span>

    </a>


    <!-- MENU -->

    <div class="demala-admin-section">
        Kelola Menu
    </div>

    <a href="{{ route('admin.menu.index') }}"
       class="demala-admin-link {{ $onMenu && !$cat && !request()->routeIs('admin.menu.create') ? 'active' : '' }}">

        <i class="bi bi-journal-text"></i>

        <span>Semua Menu</span>

        <span class="demala-admin-count">
            {{ \App\Models\Menu::count() }}
        </span>

    </a>


    <a href="{{ route('admin.menu.index', ['category' => 'Food']) }}"
       class="demala-admin-link {{ $cat === 'Food' ? 'active' : '' }}">

        <i class="bi bi-egg-fried"></i>

        <span>Food</span>

        <span class="demala-admin-count">
            {{ \App\Models\Menu::where('category', 'Food')->count() }}
        </span>

    </a>


    <a href="{{ route('admin.menu.index', ['category' => 'Drink']) }}"
       class="demala-admin-link {{ $cat === 'Drink' ? 'active' : '' }}">

        <i class="bi bi-cup-hot"></i>

        <span>Drink</span>

        <span class="demala-admin-count">
            {{ \App\Models\Menu::where('category', 'Drink')->count() }}
        </span>

    </a>


    <a href="{{ route('admin.menu.create') }}"
       class="demala-admin-link {{ request()->routeIs('admin.menu.create') ? 'active' : '' }}">

        <i class="bi bi-plus-circle"></i>

        <span>Tambah Menu</span>

    </a>


    @if(Route::has('admin.categories.index'))

        <a href="{{ route('admin.categories.index') }}"
           class="demala-admin-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

            <i class="bi bi-images"></i>

            <span>Kategori</span>

        </a>

    @endif


    <!-- WEBSITE -->

    <div class="demala-admin-section">
        Website
    </div>

    <a href="{{ route('menu.index') }}"
       target="_blank"
       class="demala-admin-link">

        <i class="bi bi-eye"></i>

        <span>Lihat Menu</span>

    </a>


    <a href="{{ url('/') }}"
       target="_blank"
       class="demala-admin-link">

        <i class="bi bi-box-arrow-up-right"></i>

        <span>Lihat Website</span>

    </a>


    <!-- USER -->

    <div class="demala-admin-bottom">

        <div class="demala-admin-user">

            <div class="demala-admin-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="demala-admin-user-name">
                    {{ Auth::user()->name }}
                </div>

                <div class="demala-admin-user-role">
                    Administrator
                </div>
            </div>

        </div>


        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="demala-admin-logout">

                <i class="bi bi-box-arrow-left me-2"></i>

                Keluar dari Admin

            </button>
        </form>

    </div>

</aside>


<!-- =========================================================
     MAIN
========================================================= -->

<div class="demala-admin-main">

    <!-- TOPBAR -->

    <header class="demala-admin-topbar">

        <h1 class="demala-admin-top-title">
            @yield('admin_page_title', 'Dashboard')
        </h1>

        <div class="demala-admin-top-right">

            <a href="{{ url('/') }}"
               target="_blank"
               class="demala-admin-view-site">

                Lihat Website

                <i class="bi bi-arrow-up-right"></i>

            </a>

            <div class="demala-admin-notification">
                <i class="bi bi-bell"></i>
            </div>

        </div>

    </header>


    <!-- CONTENT -->

    <main class="demala-admin-content">

        @yield('content')

    </main>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>