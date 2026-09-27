@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('admin_page_title', 'Dashboard')


@section('content')

@if(Auth::user()->role === 'admin')


    <!-- =====================================================
         WELCOME
    ===================================================== -->

    <div class="demala-dashboard-welcome">

        <div class="demala-dashboard-eyebrow">
            Demala Brew & Dine Society
        </div>

        <h2>
            Selamat datang kembali,
            {{ Auth::user()->name }} 👋
        </h2>

        <p>
            Kelola menu, kategori, dan tampilan website Demala dari sini.
        </p>

    </div>


    <!-- =====================================================
         STATISTICS
    ===================================================== -->

    <div class="row g-3">

        <!-- TOTAL MENU -->

        <div class="col-xl-4 col-md-4">

            <a href="{{ route('admin.menu.index') }}"
               class="text-decoration-none">

                <div class="demala-stat-card">

                    <div class="demala-stat-top">

                        <div class="demala-stat-label">
                            Total Menu
                        </div>

                        <div class="demala-stat-icon">
                            <i class="bi bi-journal-text"></i>
                        </div>

                    </div>

                    <div class="demala-stat-number">
                        {{ \App\Models\Menu::count() }}
                    </div>

                    <div class="demala-stat-link">
                        Lihat semua menu
                        <i class="bi bi-arrow-right ms-1"></i>
                    </div>

                </div>

            </a>

        </div>


        <!-- FOOD -->

        <div class="col-xl-4 col-md-4">

            <a href="{{ route('admin.menu.index', ['category' => 'Food']) }}"
               class="text-decoration-none">

                <div class="demala-stat-card">

                    <div class="demala-stat-top">

                        <div class="demala-stat-label">
                            Menu Food
                        </div>

                        <div class="demala-stat-icon">
                            <i class="bi bi-egg-fried"></i>
                        </div>

                    </div>

                    <div class="demala-stat-number">
                        {{ \App\Models\Menu::where('category', 'Food')->count() }}
                    </div>

                    <div class="demala-stat-link">
                        Kelola menu food
                        <i class="bi bi-arrow-right ms-1"></i>
                    </div>

                </div>

            </a>

        </div>


        <!-- DRINK -->

        <div class="col-xl-4 col-md-4">

            <a href="{{ route('admin.menu.index', ['category' => 'Drink']) }}"
               class="text-decoration-none">

                <div class="demala-stat-card">

                    <div class="demala-stat-top">

                        <div class="demala-stat-label">
                            Menu Drink
                        </div>

                        <div class="demala-stat-icon">
                            <i class="bi bi-cup-hot"></i>
                        </div>

                    </div>

                    <div class="demala-stat-number">
                        {{ \App\Models\Menu::where('category', 'Drink')->count() }}
                    </div>

                    <div class="demala-stat-link">
                        Kelola menu drink
                        <i class="bi bi-arrow-right ms-1"></i>
                    </div>

                </div>

            </a>

        </div>

    </div>


    <!-- =====================================================
         QUICK ACTION
    ===================================================== -->

    <div class="demala-dashboard-section">

        <div class="demala-section-heading">

            <h3>
                Aksi Cepat
            </h3>

            <span>
                Kelola website Demala
            </span>

        </div>


        <div class="row g-3">

            <!-- TAMBAH MENU -->

            <div class="col-md-4">

                <a href="{{ route('admin.menu.create') }}"
                   class="demala-action-card">

                    <div class="demala-action-card-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <h4>
                        Tambah Menu
                    </h4>

                    <p>
                        Tambahkan makanan atau minuman baru ke menu Demala.
                    </p>

                    <div class="demala-action-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>

                </a>

            </div>


            <!-- KELOLA MENU -->

            <div class="col-md-4">

                <a href="{{ route('admin.menu.index') }}"
                   class="demala-action-card">

                    <div class="demala-action-card-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>

                    <h4>
                        Kelola Menu
                    </h4>

                    <p>
                        Edit, hapus, dan lihat seluruh menu yang tersedia.
                    </p>

                    <div class="demala-action-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>

                </a>

            </div>


            <!-- KATEGORI -->

            @if(Route::has('admin.categories.index'))

                <div class="col-md-4">

                    <a href="{{ route('admin.categories.index') }}"
                       class="demala-action-card">

                        <div class="demala-action-card-icon">
                            <i class="bi bi-images"></i>
                        </div>

                        <h4>
                            Kelola Kategori
                        </h4>

                        <p>
                            Atur foto dan tampilan kategori menu Demala.
                        </p>

                        <div class="demala-action-arrow">
                            <i class="bi bi-arrow-up-right"></i>
                        </div>

                    </a>

                </div>

            @endif

        </div>

    </div>


    <!-- =====================================================
         MENU SUMMARY + INFO
    ===================================================== -->

    <div class="demala-dashboard-section">

        <div class="row g-4">


            <!-- RINGKASAN MENU -->

            <div class="col-lg-7">

                <div class="demala-section-heading">

                    <h3>
                        Ringkasan Menu
                    </h3>

                    <span>
                        Berdasarkan kategori
                    </span>

                </div>


                <div class="demala-menu-summary">

                    <div class="demala-menu-summary-head">

                        <h4>
                            Menu Demala
                        </h4>

                        <a href="{{ route('admin.menu.index') }}">
                            Lihat semua
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>


                    <!-- FOOD -->

                    <div class="demala-menu-row">

                        <div class="demala-menu-info">

                            <div class="demala-menu-icon">
                                <i class="bi bi-egg-fried"></i>
                            </div>

                            <div>

                                <div class="demala-menu-name">
                                    Food
                                </div>

                                <div class="demala-menu-type">
                                    Makanan
                                </div>

                            </div>

                        </div>

                        <div class="demala-menu-count">
                            {{ \App\Models\Menu::where('category', 'Food')->count() }}
                        </div>

                    </div>


                    <!-- DRINK -->

                    <div class="demala-menu-row">

                        <div class="demala-menu-info">

                            <div class="demala-menu-icon">
                                <i class="bi bi-cup-hot"></i>
                            </div>

                            <div>

                                <div class="demala-menu-name">
                                    Drink
                                </div>

                                <div class="demala-menu-type">
                                    Minuman
                                </div>

                            </div>

                        </div>

                        <div class="demala-menu-count">
                            {{ \App\Models\Menu::where('category', 'Drink')->count() }}
                        </div>

                    </div>


                    <!-- TOTAL -->

                    <div class="demala-menu-row">

                        <div class="demala-menu-info">

                            <div class="demala-menu-icon">
                                <i class="bi bi-grid"></i>
                            </div>

                            <div>

                                <div class="demala-menu-name">
                                    Total Menu
                                </div>

                                <div class="demala-menu-type">
                                    Seluruh menu aktif
                                </div>

                            </div>

                        </div>

                        <div class="demala-menu-count">
                            {{ \App\Models\Menu::count() }}
                        </div>

                    </div>

                </div>

            </div>


            <!-- INFO -->

            <div class="col-lg-5">

                <div class="demala-section-heading">

                    <h3>
                        Demala
                    </h3>

                </div>


                <div class="demala-info-card">

                    <div class="demala-info-eyebrow">
                        Brew & Dine Society
                    </div>

                    <h4>
                        Kelola dengan mudah.
                    </h4>

                    <p>
                        Dashboard ini digunakan untuk mengatur menu
                        dan kategori yang tampil pada website Demala.
                        Pastikan informasi menu selalu diperbarui.
                    </p>

                    <a href="{{ url('/') }}"
                       target="_blank"
                       class="btn">

                        <i class="bi bi-eye me-1"></i>

                        Lihat Website

                    </a>

                </div>

            </div>

        </div>

    </div>


@else

    <!-- =====================================================
         USER NON ADMIN
    ===================================================== -->

    <div class="demala-dashboard-welcome">

        <div class="demala-dashboard-eyebrow">
            Demala Brew & Dine Society
        </div>

        <h2>
            Selamat datang, {{ Auth::user()->name }}
        </h2>

        <p>
            Jelajahi menu Demala Brew & Dine Society.
        </p>

    </div>

<a href="{{ route('menu.index') }}" class="demala-dashboard-menu-btn">
    <i class="bi bi-cup-hot me-1"></i>
    Lihat Menu
</a>

@endif

@endsection