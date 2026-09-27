@extends('layouts.admin')

@section('title', 'Kelola Menu')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Kelola Menu {{ $category ? '— ' . $category : '' }}</h3>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-success">+ Tambah Menu Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tab filter --}}
    <div class="mb-4 d-flex gap-2">
        <a href="{{ route('admin.menu.index') }}"
           class="btn btn-sm {{ !$category ? 'btn-primary' : 'btn-outline-primary' }}">
            Semua ({{ \App\Models\Menu::count() }})
        </a>
        <a href="{{ route('admin.menu.index', ['category' => 'Food']) }}"
           class="btn btn-sm {{ $category === 'Food' ? 'btn-primary' : 'btn-outline-primary' }}">
            Food
        </a>
        <a href="{{ route('admin.menu.index', ['category' => 'Drink']) }}"
           class="btn btn-sm {{ $category === 'Drink' ? 'btn-primary' : 'btn-outline-primary' }}">
            Drink
        </a>
    </div>

    {{-- Daftar per kategori menu --}}
    @forelse($groups as $groupName => $items)
        <div class="card mb-3 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <strong>{{ $groupName }}</strong>
                <span class="text-muted">{{ $items->count() }} menu</span>
            </div>

            <div class="table-responsive">
                <table class="table table-sm mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td>
                                    @if($menu->is_available)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-secondary">Habis</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.menu.edit', $menu) }}"
                                       class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.menu.destroy', $menu) }}" method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Belum ada menu.</div>
    @endforelse

@endsection