@extends('layouts.admin')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="color: #001f3f;" class="mb-4">Tambah Menu Baru</h2>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Menu *</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Kopi Susu Gula Aren"
                                required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="Deskripsi menu...">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga (Rp) *</label>
                            <input
                                type="number"
                                class="form-control @error('price') is-invalid @enderror"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                placeholder="Contoh: 25000"
                                min="1000"
                                required>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori *</label>
                            <select
                                class="form-select @error('category') is-invalid @enderror"
                                id="category"
                                name="category"
                                required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>🍽️ Food</option>
                                <option value="Drink" {{ old('category') == 'Drink' ? 'selected' : '' }}>🥤 Drink</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="group_name" class="form-label">Nama Grup *</label>
                            <input
                                type="text"
                                class="form-control @error('group_name') is-invalid @enderror"
                                id="group_name"
                                name="group_name"
                                value="{{ old('group_name') }}"
                                placeholder="Contoh: Artisan Specialty Coffee"
                                required>
                            @error('group_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Grup (pilih dari galeri)</label>
                            <input type="file"
                                   class="form-control @error('photo') is-invalid @enderror"
                                   id="photo" name="photo" accept="image/*">
                            <div class="form-text">
                                Dipakai untuk kartu grup di halaman menu. Kosongkan kalau grupnya sudah punya foto.
                            </div>
                            @error('photo')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                            <img id="photo-preview" class="mt-2 rounded d-none" style="max-height:160px;" alt="Pratinjau">
                        </div>

                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="is_available"
                                name="is_available"
                                value="1"
                                {{ old('is_available', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">
                                Menu Tersedia
                            </label>
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Urutan (Sort Order)</label>
                            <input
                                type="number"
                                class="form-control @error('sort_order') is-invalid @enderror"
                                id="sort_order"
                                name="sort_order"
                                value="{{ old('sort_order') }}"
                                placeholder="Kosongkan = otomatis di paling akhir"
                                min="0">
                            @error('sort_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                ✓ Simpan Menu
                            </button>
                            <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-dark">
                                ✕ Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('photo').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const img  = document.getElementById('photo-preview');
        if (file) {
            img.src = URL.createObjectURL(file);
            img.classList.remove('d-none');
        }
    });
</script>
@endsection