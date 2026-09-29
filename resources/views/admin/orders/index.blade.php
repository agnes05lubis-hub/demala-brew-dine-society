@extends('layouts.admin')

@section('title', 'Pesanan')
@section('admin_page_title', 'Pesanan')

@section('content')

<div class="adm-page">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="flash">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="orders-header">
        <div>
            <span class="orders-eyebrow">OPERASIONAL</span>
            <h2>Pesanan Demala</h2>
            <p>Kelola dan pantau pesanan pelanggan.</p>
        </div>
    </div>

    {{-- Tab status --}}
    <div class="tabs">

        <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}"
           class="{{ $status === 'pending' ? 'on' : '' }}">
            Menunggu
            <span>{{ $counts['pending'] ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'confirmed']) }}"
           class="{{ $status === 'confirmed' ? 'on' : '' }}">
            Dikonfirmasi
            <span>{{ $counts['confirmed'] ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'preparing']) }}"
           class="{{ $status === 'preparing' ? 'on' : '' }}">
            Diproses
            <span>{{ $counts['preparing'] ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'ready']) }}"
           class="{{ $status === 'ready' ? 'on' : '' }}">
            Siap
            <span>{{ $counts['ready'] ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}"
           class="{{ $status === 'completed' ? 'on' : '' }}">
            Selesai
            <span>{{ $counts['completed'] ?? 0 }}</span>
        </a>

        <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}"
           class="{{ $status === 'cancelled' ? 'on' : '' }}">
            Dibatalkan
            <span>{{ $counts['cancelled'] ?? 0 }}</span>
        </a>

    </div>


    {{-- Daftar pesanan --}}
    @forelse($orders as $order)

        <div class="order-card">

            {{-- Bagian kiri --}}
            <div class="order-main">

                <div class="order-top">

                    <div>
                        <span class="order-number">
                            #{{ $order->order_number }}
                        </span>

                        <h3>
                            {{ $order->customer_name }}
                        </h3>
                    </div>

                    <span class="order-status status-{{ $order->status }}">
                        @switch($order->status)
                            @case('pending')
                                Menunggu
                                @break

                            @case('confirmed')
                                Dikonfirmasi
                                @break

                            @case('preparing')
                                Diproses
                                @break

                            @case('ready')
                                Siap
                                @break

                            @case('completed')
                                Selesai
                                @break

                            @case('cancelled')
                                Dibatalkan
                                @break
                        @endswitch
                    </span>

                </div>


                {{-- Informasi pesanan --}}
                <div class="order-info">

                    <span>
                        <i class="bi bi-telephone"></i>
                        {{ $order->phone }}
                    </span>

                    <span>
                        <i class="bi bi-shop"></i>

                        @if($order->order_type === 'dine_in')
                            Makan di tempat
                        @else
                            Takeaway
                        @endif
                    </span>

                    <span>
                        <i class="bi bi-clock"></i>
                        {{ $order->created_at->format('d M Y, H:i') }}
                    </span>

                </div>


                {{-- Item --}}
                <div class="order-items">

                    @foreach($order->items as $item)

                        <div class="order-item">

                            <span>
                                {{ $item->quantity }} ×
                                {{ $item->menu->name ?? 'Menu dihapus' }}
                            </span>

                            <strong>
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </strong>

                        </div>

                    @endforeach

                </div>


                {{-- Total --}}
                <div class="order-total">

                    <span>Total</span>

                    <strong>
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </strong>

                </div>

            </div>


            {{-- Tombol --}}
            <div class="order-actions">

                <a href="{{ route('admin.orders.show', $order) }}"
                   class="btn-view">
                    <i class="bi bi-eye"></i>
                    Detail
                </a>

                @if($order->status !== 'completed' && $order->status !== 'cancelled')

                    <form method="POST"
                          action="{{ route('admin.orders.status', $order) }}">

                        @csrf
                        @method('PATCH')

                        <input type="hidden"
                               name="status"
                               value="{{ match($order->status) {
                                   'pending' => 'confirmed',
                                   'confirmed' => 'preparing',
                                   'preparing' => 'ready',
                                   'ready' => 'completed',
                                   default => 'completed'
                               } }}">

                        <button type="submit" class="btn-next">

                            @switch($order->status)

                                @case('pending')
                                    Konfirmasi
                                    @break

                                @case('confirmed')
                                    Mulai Proses
                                    @break

                                @case('preparing')
                                    Tandai Siap
                                    @break

                                @case('ready')
                                    Selesaikan
                                    @break

                            @endswitch

                        </button>

                    </form>

                @endif


                <form method="POST"
                      action="{{ route('admin.orders.destroy', $order) }}"
                      onsubmit="return confirm('Hapus pesanan ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn-delete">
                        <i class="bi bi-trash"></i>
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="empty">

            <i class="bi bi-receipt"></i>

            <h3>Belum ada pesanan</h3>

            <p>
                Pesanan pelanggan akan muncul di sini.
            </p>

        </div>

    @endforelse


    {{-- Pagination --}}
    @if($orders->hasPages())

        <div class="pager">

            {{ $orders->links() }}

        </div>

    @endif

</div>

@endsection