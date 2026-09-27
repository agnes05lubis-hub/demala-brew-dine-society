@extends('layouts.app')

@section('title', $menu->name . ' — Demala Brew & Dine Society')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            @if($menu->group_image)
                <img
                    src="{{ asset('storage/images/' . $menu->group_image) }}"
                    alt="{{ $menu->name }}"
                    style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px;"
                    onerror="this.src='{{ asset('storage/images/demala-foto.jpg') }}';"
                >
            @else
                <div style="height: 400px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999; border-radius: 8px;">
                    No Image
                </div>
            @endif
        </div>

        <div class="col-md-6">
            <h2 style="color: #001f3f;">{{ $menu->name }}</h2>

            <div class="mb-3">
                <span class="badge bg-dark me-2">{{ $menu->category }}</span>
                <span class="badge bg-light text-dark">{{ $menu->group_name }}</span>
            </div>

            <p class="text-muted">{{ $menu->description }}</p>

            <h3 style="color: #ff6b6b;" class="mb-3">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </h3>

            @if($menu->is_available)
                <span class="badge bg-success mb-3">✓ Tersedia</span>
            @else
                <span class="badge bg-danger mb-3">✗ Tidak Tersedia</span>
            @endif

            <div class="mt-4">
                <a href="{{ route('menu.index') }}" class="btn btn-outline-dark">
                    ← Kembali ke Menu
                </a>
            </div>
        </div>
    </div>
</div>
@endsection