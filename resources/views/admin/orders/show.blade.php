@extends('layouts.admin')

@section('title', 'Detail Pesanan')
@section('admin_page_title', 'Detail Pesanan')

@section('content')

<div class="adm-page">

    {{-- Tombol kembali --}}
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.orders.index') }}" class="btn-view">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Pesanan
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="flash">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header pesanan --}}
    <div class="order-detail-header">

        <div>
            <span class="orders-eyebrow">DETAIL PESANAN</span>

            <h2>
                #{{ $order->order_number }}
            </h2>

            <p>
                Dibuat {{ $order->created_at->format('d M Y, H:i') }}
            </p>
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


    {{-- Informasi pelanggan --}}
    <div class="order-detail-grid">

        <div class="order-detail-box">

            <div class="detail-box-title">
                <i class="bi bi-person"></i>
                Pelanggan
            </div>

            <h3>
                {{ $order->customer_name }}
            </h3>

            <p>
                <i class="bi bi-telephone"></i>
                {{ $order->phone }}
            </p>

        </div>


        <div class="order-detail-box">

            <div class="detail-box-title">
                <i class="bi bi-shop"></i>
                Jenis Pesanan
            </div>

            <h3>
                @if($order->order_type === 'dine_in')
                    Makan di Tempat
                @else
                    Takeaway
                @endif
            </h3>

        </div>

    </div>


    {{-- Daftar menu --}}
    <div class="order-detail-box">

        <div class="detail-box-title">
            <i class="bi bi-receipt"></i>
            Detail Menu
        </div>


        <div class="detail-items">

            @foreach($order->items as $item)

                <div class="detail-item">

                    <div class="detail-item-info">

                        @if($item->menu && $item->menu->image)

                            <img
                                src="{{ asset('storage/' . $item->menu->image) }}"
                                alt="{{ $item->menu->name }}"
                                class="detail-menu-image"
                            >

                        @endif

                        <div>

                            <strong>
                                {{ $item->menu->name ?? 'Menu dihapus' }}
                            </strong>

                            <span>
                                {{ $item->quantity }} ×
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>

                            @if($item->notes)
                                <small>
                                    Catatan: {{ $item->notes }}
                                </small>
                            @endif

                        </div>

                    </div>


                    <strong>
                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </strong>

                </div>

            @endforeach

        </div>


        {{-- Total --}}
        <div class="detail-total">

            <span>Total Pesanan</span>

            <strong>
                Rp {{ number_format($order->total, 0, ',', '.') }}
            </strong>

        </div>

    </div>


    {{-- Catatan pelanggan --}}
    @if($order->notes)

        <div class="order-detail-box">

            <div class="detail-box-title">
                <i class="bi bi-chat-left-text"></i>
                Catatan Pelanggan
            </div>

            <p class="customer-note">
                {{ $order->notes }}
            </p>

        </div>

    @endif


    {{-- Ubah status --}}
    @if($order->status !== 'completed' && $order->status !== 'cancelled')

        <div class="order-detail-box">

            <div class="detail-box-title">
                <i class="bi bi-arrow-repeat"></i>
                Ubah Status Pesanan
            </div>

            <form
                method="POST"
                action="{{ route('admin.orders.status', $order) }}"
                class="status-form"
            >

                @csrf
                @method('PATCH')

                <select name="status">

                    <option value="pending"
                        {{ $order->status === 'pending' ? 'selected' : '' }}>
                        Menunggu
                    </option>

                    <option value="confirmed"
                        {{ $order->status === 'confirmed' ? 'selected' : '' }}>
                        Dikonfirmasi
                    </option>

                    <option value="preparing"
                        {{ $order->status === 'preparing' ? 'selected' : '' }}>
                        Diproses
                    </option>

                    <option value="ready"
                        {{ $order->status === 'ready' ? 'selected' : '' }}>
                        Siap
                    </option>

                    <option value="completed"
                        {{ $order->status === 'completed' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="cancelled"
                        {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                        Dibatalkan
                    </option>

                </select>

                <button type="submit" class="btn-next">
                    Simpan Status
                </button>

            </form>

        </div>

    @endif

</div>

@endsection