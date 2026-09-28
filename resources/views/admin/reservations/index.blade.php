@extends('layouts.admin')

@section('title', 'Reservasi')
@section('admin_page_title', 'Reservasi Meja')

@section('content')
<div class="adm-page">

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    <div class="tabs">
        <a href="?status=pending"   class="{{ $status === 'pending'   ? 'on' : '' }}">Menunggu ({{ $counts['pending'] ?? 0 }})</a>
        <a href="?status=confirmed" class="{{ $status === 'confirmed' ? 'on' : '' }}">Dikonfirmasi ({{ $counts['confirmed'] ?? 0 }})</a>
        <a href="?status=cancelled" class="{{ $status === 'cancelled' ? 'on' : '' }}">Dibatalkan ({{ $counts['cancelled'] ?? 0 }})</a>
    </div>

    @forelse($reservations as $r)
        @php
            $wa = preg_replace('/\D/', '', $r->phone);
            if (str_starts_with($wa, '0')) { $wa = '62' . substr($wa, 1); }
        @endphp

        <div class="rev">
            <div>
                <span class="who">{{ $r->name }}</span>
                <small>{{ $r->guests }} orang</small>
                <p>
                    <i class="bi bi-calendar-event"></i> {{ $r->reservation_date->format('d M Y') }}
                    &nbsp;•&nbsp;
                    <i class="bi bi-clock"></i> {{ substr($r->reservation_time, 0, 5) }}
                    &nbsp;•&nbsp;
                    <i class="bi bi-whatsapp"></i>
                    <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener">{{ $r->phone }}</a>
                </p>
                @if($r->notes)
                    <p>Catatan: {{ $r->notes }}</p>
                @endif
            </div>

            <div class="acts">
                @if($r->status !== 'confirmed')
                    <form method="POST" action="{{ route('admin.reservations.confirm', $r) }}">
                        @csrf @method('PATCH')
                        <button class="ok" type="submit">Konfirmasi</button>
                    </form>
                @endif

                @if($r->status !== 'cancelled')
                    <form method="POST" action="{{ route('admin.reservations.cancel', $r) }}">
                        @csrf @method('PATCH')
                        <button class="no" type="submit">Batalkan</button>
                    </form>
                @endif

                <form method="POST" action="{{ route('admin.reservations.destroy', $r) }}" onsubmit="return confirm('Hapus reservasi ini?')">
                    @csrf @method('DELETE')
                    <button class="del" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">Tidak ada reservasi di tab ini.</div>
    @endforelse

    <div class="pager">
        @if($reservations->previousPageUrl())
            <a href="{{ $reservations->previousPageUrl() }}">← Sebelumnya</a>
        @endif
        @if($reservations->nextPageUrl())
            <a href="{{ $reservations->nextPageUrl() }}">Berikutnya →</a>
        @endif
    </div>

</div>
@endsection