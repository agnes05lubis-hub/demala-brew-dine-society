@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('admin_page_title', 'Dashboard')


@section('content')


@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Str;

    /* ---------- DATA YANG SUDAH ADA ---------- */
    $pendingReviews      = \App\Models\Review::where('status', 'pending')->count();
    $pendingReservations = \App\Models\Reservation::where('status', 'pending')->count();
    $totalUsers          = \App\Models\User::where('role', 'user')->count();
    $totalMenu           = \App\Models\Menu::count();
    $totalFood           = \App\Models\Menu::where('category', 'Food')->count();
    $totalDrink          = \App\Models\Menu::where('category', 'Drink')->count();

    /* ---------- DATA BARU (aman walau tabel belum dibuat) ---------- */
    $hasOrders = Schema::hasTable('orders');
    $hasTables = Schema::hasTable('dining_tables');

    $revenueToday = $hasOrders
        ? DB::table('orders')->where('status', 'paid')->whereDate('created_at', today())->sum('total')
        : 0;
    $revenueMonth = $hasOrders
        ? DB::table('orders')->where('status', 'paid')
            ->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('total')
        : 0;
    $ordersToday  = $hasOrders ? DB::table('orders')->whereDate('created_at', today())->count() : 0;

    $tablesTotal    = $hasTables ? DB::table('dining_tables')->count() : 0;
    $tablesOccupied = $hasTables ? DB::table('dining_tables')->where('status', 'terisi')->count() : 0;
    $tablesReserved = $hasTables ? DB::table('dining_tables')->where('status', 'reservasi')->count() : 0;

    $rp = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');

    /* ---------- GRAFIK 7 HARI ---------- */
    $days         = collect(range(6, 0))->map(fn ($i) => now()->subDays($i)->startOfDay());
    $chartLabels  = $days->map(fn ($d) => $d->format('d M'))->values();
    $chartReviews = $days->map(fn ($d) => \App\Models\Review::whereDate('created_at', $d)->count())->values();
    $chartUsers   = $days->map(fn ($d) => \App\Models\User::where('role', 'user')->whereDate('created_at', $d)->count())->values();
    $chartReserv  = $days->map(fn ($d) => \App\Models\Reservation::whereDate('created_at', $d)->count())->values();

    /* ---------- DAFTAR ---------- */
    $latestReviews      = \App\Models\Review::where('status', 'pending')->latest()->take(5)->get();
    $newUsers           = \App\Models\User::where('role', 'user')->latest()->take(5)->get();
    $latestReservations = \App\Models\Reservation::where('status', 'pending')
                            ->orderBy('reservation_date')->orderBy('reservation_time')->take(5)->get();
@endphp


    <!-- WELCOME -->

    <div class="demala-dashboard-welcome">
        <div class="demala-dashboard-eyebrow">Demala Brew & Dine Society</div>
        <h2>Selamat datang kembali, {{ Auth::user()->name }}</h2>
        <p>Ringkasan penjualan, pesanan, meja, dan aktivitas cafe hari ini.</p>
    </div>


    <!-- BARIS 1: KEUANGAN & OPERASIONAL -->

    <div class="row g-3">

        <div class="col-xl-3 col-md-6">
            <div class="demala-stat-card">
                <div class="demala-stat-top">
                    <div class="demala-stat-label">Pendapatan Bulan Ini</div>
                    <div class="demala-stat-icon"><i class="bi bi-cash-stack"></i></div>
                </div>
                <div class="demala-stat-number demala-stat-money">{{ $rp($revenueMonth) }}</div>
                <div class="demala-stat-hint">{{ $hasOrders ? 'Dari pesanan lunas' : 'Belum ada data pesanan' }}</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="demala-stat-card">
                <div class="demala-stat-top">
                    <div class="demala-stat-label">Pendapatan Hari Ini</div>
                    <div class="demala-stat-icon"><i class="bi bi-graph-up-arrow"></i></div>
                </div>
                <div class="demala-stat-number demala-stat-money">{{ $rp($revenueToday) }}</div>
                <div class="demala-stat-hint">{{ now()->translatedFormat('d F Y') }}</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="demala-stat-card">
                <div class="demala-stat-top">
                    <div class="demala-stat-label">Jumlah Pesanan Hari Ini</div>
                    <div class="demala-stat-icon"><i class="bi bi-receipt"></i></div>
                </div>
                <div class="demala-stat-number">{{ $ordersToday }}</div>
                <div class="demala-stat-hint">{{ $hasOrders ? 'Semua status' : 'Belum ada data pesanan' }}</div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="demala-stat-card">
                <div class="demala-stat-top">
                    <div class="demala-stat-label">Meja Terisi</div>
                    <div class="demala-stat-icon"><i class="bi bi-grid-3x3-gap"></i></div>
                </div>
                <div class="demala-stat-number">{{ $tablesOccupied }} <small class="demala-stat-of">/ {{ $tablesTotal }}</small></div>
                <div class="demala-stat-hint">
                    {{ $hasTables ? $tablesReserved . ' meja direservasi' : 'Belum ada data meja' }}
                </div>
            </div>
        </div>

    </div>


    <!-- BARIS 2: MENU, RESERVASI, ULASAN, USER -->

    <div class="row g-3 mt-1">

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.menu.index') }}" class="text-decoration-none">
                <div class="demala-stat-card">
                    <div class="demala-stat-top">
                        <div class="demala-stat-label">Total Menu</div>
                        <div class="demala-stat-icon"><i class="bi bi-journal-text"></i></div>
                    </div>
                    <div class="demala-stat-number">{{ $totalMenu }}</div>
                    <div class="demala-stat-link">{{ $totalFood }} Food • {{ $totalDrink }} Drink <i class="bi bi-arrow-right ms-1"></i></div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
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

        <div class="col-xl-3 col-md-6">
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

        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <div class="demala-stat-card">
                    <div class="demala-stat-top">
                        <div class="demala-stat-label">User Terdaftar</div>
                        <div class="demala-stat-icon"><i class="bi bi-people"></i></div>
                    </div>
                    <div class="demala-stat-number">{{ $totalUsers }}</div>
                    <div class="demala-stat-link">Lihat pengguna <i class="bi bi-arrow-right ms-1"></i></div>
                </div>
            </a>
        </div>

    </div>


    <!-- GRAFIK + RESERVASI MENUNGGU -->

    <div class="row g-4 demala-dashboard-section">

        <div class="col-lg-8">
            <div class="demala-section-heading">
                <h3>Aktivitas 7 Hari Terakhir</h3>
                <span>Reservasi, ulasan & user baru</span>
            </div>
            <div class="demala-chart-card">
                <canvas id="demalaChart"></canvas>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="demala-section-heading">
                <h3>Reservasi Menunggu</h3>
                <span>Paling dekat dulu</span>
            </div>
            <div class="demala-menu-summary demala-panel-fill">
                @forelse($latestReservations as $r)
                    <div class="demala-menu-row">
                        <div>
                            <div class="demala-menu-name">
                                {{ $r->name }}
                                <small class="text-muted">• {{ $r->guests }} orang</small>
                            </div>
                            <div class="demala-menu-type">
                                {{ $r->reservation_date->format('d M Y') }}, {{ substr($r->reservation_time, 0, 5) }}
                            </div>
                        </div>
                        <div class="d-flex gap-1 ms-auto">
                            <form method="POST" action="{{ route('admin.reservations.confirm', $r) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-success" title="Konfirmasi"><i class="bi bi-check-lg"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.reservations.cancel', $r) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-warning" title="Batalkan"><i class="bi bi-x-lg"></i></button>
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

    </div>


    <!-- ULASAN + USER BARU -->

    <div class="row g-4 demala-dashboard-section">

        <div class="col-lg-7">
            <div class="demala-section-heading">
                <h3>Ulasan Menunggu</h3>
                <span>5 terbaru</span>
            </div>
            <div class="demala-menu-summary">
                @forelse($latestReviews as $r)
                    <div class="demala-menu-row">
                        <div class="flex-fill" style="min-width:0">
                            <div class="demala-menu-name">
                                {{ $r->name }}
                                <span class="demala-stars">{{ str_repeat('★', $r->rating ?? 5) }}</span>
                            </div>
                            <div class="demala-menu-type">{{ Str::limit($r->message, 70) }}</div>
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
                        <div class="flex-fill" style="min-width:0">
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


    <!-- AKSI CEPAT -->

    <div class="demala-dashboard-section">

        <div class="demala-section-heading">
            <h3>Aksi Cepat</h3>
            <span>Kelola website Demala</span>
        </div>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="{{ route('admin.menu.create') }}" class="demala-action-card">
                    <div class="demala-action-card-icon"><i class="bi bi-plus-lg"></i></div>
                    <h4>Tambah Menu</h4>
                    <p>Tambahkan makanan atau minuman baru.</p>
                    <div class="demala-action-arrow"><i class="bi bi-arrow-up-right"></i></div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.menu.index') }}" class="demala-action-card">
                    <div class="demala-action-card-icon"><i class="bi bi-journal-text"></i></div>
                    <h4>Kelola Menu</h4>
                    <p>Edit, hapus, atur harga dan ketersediaan menu.</p>
                    <div class="demala-action-arrow"><i class="bi bi-arrow-up-right"></i></div>
                </a>
            </div>

            @if(Route::has('admin.categories.index'))
                <div class="col-md-4">
                    <a href="{{ route('admin.categories.index') }}" class="demala-action-card">
                        <div class="demala-action-card-icon"><i class="bi bi-images"></i></div>
                        <h4>Kelola Kategori</h4>
                        <p>Atur foto dan tampilan kategori menu.</p>
                        <div class="demala-action-arrow"><i class="bi bi-arrow-up-right"></i></div>
                    </a>
                </div>
            @endif

        </div>

    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            new Chart(document.getElementById('demalaChart'), {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [
                        { label: 'Reservasi', data: @json($chartReserv),  borderColor: '#2e7d5b', backgroundColor: 'rgba(46,125,91,.10)',  fill: true, tension: 0.4 },
                        { label: 'Ulasan',    data: @json($chartReviews), borderColor: '#c9a24d', backgroundColor: 'rgba(201,162,77,.15)', fill: true, tension: 0.4 },
                        { label: 'User baru', data: @json($chartUsers),   borderColor: '#0b1b33', backgroundColor: 'rgba(11,27,51,.08)',   fill: true, tension: 0.4 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        </script>
    @endpush

@endsection