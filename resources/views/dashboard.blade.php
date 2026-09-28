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
    @php
        $pendingReviews      = \App\Models\Review::where('status', 'pending')->count();
        $pendingReservations = \App\Models\Reservation::where('status', 'pending')->count();
        $totalUsers          = \App\Models\User::where('role', 'user')->count();

        $days         = collect(range(6, 0))->map(fn ($i) => now()->subDays($i)->startOfDay());
        $chartLabels  = $days->map(fn ($d) => $d->format('d M'))->values();
        $chartReviews = $days->map(fn ($d) => \App\Models\Review::whereDate('created_at', $d)->count())->values();
        $chartUsers   = $days->map(fn ($d) => \App\Models\User::where('role', 'user')->whereDate('created_at', $d)->count())->values();
        $chartReserv  = $days->map(fn ($d) => \App\Models\Reservation::whereDate('created_at', $d)->count())->values();

        $latestReviews      = \App\Models\Review::where('status', 'pending')->latest()->take(5)->get();
        $newUsers           = \App\Models\User::where('role', 'user')->latest()->take(5)->get();
        $latestReservations = \App\Models\Reservation::where('status', 'pending')
                                ->orderBy('reservation_date')->orderBy('reservation_time')->take(5)->get();
    @endphp

    <!-- KARTU: RESERVASI, ULASAN, USER -->
    <div class="row g-3 mt-1">
        <div class="col-md-4">
            <a href="{{ route('admin.reservations.index') }}" class="text-decoration-none">
                <div class="demala-stat-card">
                    <div class="demala-stat-top">
                        <div class="demala-stat-label">Reservasi Menunggu</div>
                        <div class="demala-stat-icon"><i class="bi bi-calendar-check"></i></div>
                    </div>
                    <div class="demala-stat-number">{{ $pendingReservations }}</div>
                    <div class="demala-stat-link">Kelola reservasi <i class="bi bi-arrow-right ms-1"></i></div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.reviews.index') }}" class="text-decoration-none">
                <div class="demala-stat-card">
                    <div class="demala-stat-top">
                        <div class="demala-stat-label">Ulasan Menunggu</div>
                        <div class="demala-stat-icon"><i class="bi bi-chat-heart"></i></div>
                    </div>
                    <div class="demala-stat-number">{{ $pendingReviews }}</div>
                    <div class="demala-stat-link">Tinjau ulasan <i class="bi bi-arrow-right ms-1"></i></div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <div class="demala-stat-card">
                    <div class="demala-stat-top">
                        <div class="demala-stat-label">User Terdaftar</div>
                        <div class="demala-stat-icon"><i class="bi bi-people"></i></div>
                    </div>
                    <div class="demala-stat-number">{{ $totalUsers }}</div>
                    <div class="demala-stat-link">Lihat daftar user <i class="bi bi-arrow-right ms-1"></i></div>
                </div>
            </a>
        </div>
    </div>

    <!-- KURVA 7 HARI -->
    <div class="demala-dashboard-section">
        <div class="demala-section-heading">
            <h3>Aktivitas 7 Hari Terakhir</h3>
            <span>Reservasi, ulasan & user baru</span>
        </div>
        <div class="demala-chart-card">
            <canvas id="demalaChart"></canvas>
        </div>
    </div>

    <!-- RESERVASI MENUNGGU -->
    <div class="demala-dashboard-section">
        <div class="demala-section-heading">
            <h3>Reservasi Menunggu</h3>
            <span>Diurutkan dari yang paling dekat</span>
        </div>
        <div class="demala-menu-summary">
            @forelse($latestReservations as $r)
                <div class="demala-menu-row">
                    <div>
                        <div class="demala-menu-name">
                            {{ $r->name }}
                            <small class="text-muted">• {{ $r->guests }} orang</small>
                        </div>
                        <div class="demala-menu-type">
                            {{ $r->reservation_date->format('d M Y') }},
                            {{ substr($r->reservation_time, 0, 5) }}
                            • {{ $r->phone }}
                        </div>
                    </div>
                    <div class="d-flex gap-1">
                        <form method="POST" action="{{ route('admin.reservations.confirm', $r) }}">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-success">Konfirmasi</button>
                        </form>
                        <form method="POST" action="{{ route('admin.reservations.cancel', $r) }}">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm btn-warning">Batalkan</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="demala-menu-row">
                    <div class="demala-menu-type">Tidak ada reservasi yang menunggu.</div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- ULASAN TERBARU + USER BARU -->
    <div class="demala-dashboard-section">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="demala-section-heading">
                    <h3>Ulasan Menunggu</h3>
                    <span>5 terbaru</span>
                </div>
                <div class="demala-menu-summary">
                    @forelse($latestReviews as $r)
                        <div class="demala-menu-row">
                            <div>
                                <div class="demala-menu-name">
                                    {{ $r->name }}
                                    <span style="color:#c9a24d">{{ str_repeat('★', $r->rating ?? 5) }}</span>
                                </div>
                                <div class="demala-menu-type">{{ \Illuminate\Support\Str::limit($r->message, 70) }}</div>
                            </div>
                            <div class="d-flex gap-1">
                                <form method="POST" action="{{ route('admin.reviews.approve', $r) }}">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-success">Terima</button>
                                </form>
                                <form method="POST" action="{{ route('admin.reviews.reject', $r) }}">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-warning">Tolak</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="demala-menu-row">
                            <div class="demala-menu-type">Tidak ada ulasan yang menunggu.</div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-5">
                <div class="demala-section-heading">
                    <h3>User Baru</h3>
                    <span>5 terbaru</span>
                </div>
                <div class="demala-menu-summary">
                    @forelse($newUsers as $u)
                        <div class="demala-menu-row">
                            <div>
                                <div class="demala-menu-name">{{ $u->name }}</div>
                                <div class="demala-menu-type">{{ $u->email }}</div>
                            </div>
                            <div class="demala-menu-type">{{ $u->created_at->diffForHumans() }}</div>
                        </div>
                    @empty
                        <div class="demala-menu-row">
                            <div class="demala-menu-type">Belum ada user yang mendaftar.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('demalaChart'), {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [
                    {
                        label: 'Reservasi',
                        data: @json($chartReserv),
                        borderColor: '#2e7d5b',
                        backgroundColor: 'rgba(46,125,91,.10)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Ulasan',
                        data: @json($chartReviews),
                        borderColor: '#c9a24d',
                        backgroundColor: 'rgba(201,162,77,.15)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'User baru',
                        data: @json($chartUsers),
                        borderColor: '#0b1b33',
                        backgroundColor: 'rgba(11,27,51,.08)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
            }
        });
    </script>
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