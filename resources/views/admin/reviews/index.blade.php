@extends('layouts.admin')

@section('title', 'Ulasan')
@section('admin_page_title', 'Ulasan')

@section('content')
<div class="adm-page">

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    <div class="tabs">
        <a href="?status=pending"  class="{{ $status === 'pending'  ? 'on' : '' }}">Menunggu ({{ $counts['pending'] ?? 0 }})</a>
        <a href="?status=approved" class="{{ $status === 'approved' ? 'on' : '' }}">Diterima ({{ $counts['approved'] ?? 0 }})</a>
        <a href="?status=rejected" class="{{ $status === 'rejected' ? 'on' : '' }}">Ditolak ({{ $counts['rejected'] ?? 0 }})</a>
    </div>

    @forelse($reviews as $r)
        <div class="rev">
            <div>
                <span class="who">{{ $r->name }}</span>
                <span class="stars">{{ str_repeat('★', $r->rating ?? 5) }}</span>
                <small>{{ $r->created_at->diffForHumans() }}</small>
                <p>{{ $r->message }}</p>
            </div>

            <div class="acts">
                @if($r->status !== 'approved')
                    <form method="POST" action="{{ route('admin.reviews.approve', $r) }}">
                        @csrf @method('PATCH')
                        <button class="ok" type="submit">Terima & Tampilkan</button>
                    </form>
                @endif

                @if($r->status !== 'rejected')
                    <form method="POST" action="{{ route('admin.reviews.reject', $r) }}">
                        @csrf @method('PATCH')
                        <button class="no" type="submit">Tolak</button>
                    </form>
                @endif

                <form method="POST" action="{{ route('admin.reviews.destroy', $r) }}" onsubmit="return confirm('Hapus ulasan ini?')">
                    @csrf @method('DELETE')
                    <button class="del" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty">Tidak ada ulasan di tab ini.</div>
    @endforelse

    <div class="pager">
        @if($reviews->previousPageUrl())
            <a href="{{ $reviews->previousPageUrl() }}">← Sebelumnya</a>
        @endif
        @if($reviews->nextPageUrl())
            <a href="{{ $reviews->nextPageUrl() }}">Berikutnya →</a>
        @endif
    </div>

</div>
@endsection