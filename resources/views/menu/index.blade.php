@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 style="color: #001f3f;" class="mb-4">Menu Demala</h2>

    {{-- Filter kategori --}}
    <div class="mb-4">
        <div class="btn-group" role="group">
            @foreach($categories as $cat)
                <a href="{{ route('menu.index', ['category' => $cat]) }}" 
                   class="btn @if($currentCategory == $cat) btn-dark @else btn-outline-dark @endif">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Tampilkan menu --}}
    @if($menus->count() > 0)
        <div class="row">
            @foreach($menus as $menu)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($menu->description, 80) }}</p>
                            
                            <div class="mb-3">
                                <span class="badge bg-light text-dark">{{ $menu->group_name }}</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0" style="color: #ff6b6b;">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </h5>
                                <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-sm btn-outline-dark">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            Tidak ada menu.
        </div>
    @endif
</div>
@endsectiondone
