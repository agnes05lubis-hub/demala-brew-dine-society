@extends(Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.user')

@section('title', 'Profil Saya')
@section('admin_page_title', 'Profil Saya')
@section('page_title', 'Profil Saya')


@section('content')

    @if(session('success'))
        <div class="demala-category-success">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        <!-- ================= KIRI: FOTO ================= -->

        <div class="col-lg-4">
            <div class="demala-profile-card text-center">

                <div class="demala-profile-photo" id="photoPreviewBox">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto profil" id="photoPreview">
                    @else
                        <span id="photoInitial">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        <img src="" alt="" id="photoPreview" style="display:none">
                    @endif
                </div>

                <h4 class="demala-profile-name">{{ $user->name }}</h4>
                <div class="demala-profile-role">{{ $user->role === 'admin' ? 'Administrator' : 'Member' }}</div>
                <div class="demala-profile-email">{{ $user->email }}</div>

                @if($user->photo)
                    <form method="POST" action="{{ route('profile.photo.remove') }}" class="mt-3">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Hapus foto profil?')">
                            <i class="bi bi-trash"></i> Hapus Foto
                        </button>
                    </form>
                @endif

            </div>
        </div>


        <!-- ================= KANAN: FORM ================= -->

        <div class="col-lg-8">

            <!-- EDIT PROFIL -->

            <div class="demala-profile-card mb-4">

                <h3 class="demala-profile-title">Edit Profil</h3>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="photo" id="photoInput" accept="image/*"
                               class="form-control @error('photo') is-invalid @enderror">
                        <small class="text-muted">JPG, PNG, atau WEBP. Maksimal 2 MB.</small>
                        @error('photo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button class="demala-profile-btn"><i class="bi bi-check2"></i> Simpan Perubahan</button>
                </form>

            </div>


            <!-- GANTI PASSWORD -->

            <div class="demala-profile-card">

                <h3 class="demala-profile-title">Ganti Password</h3>

                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        <small class="text-muted">Minimal 8 karakter: huruf besar, huruf kecil, angka, dan simbol.</small>
                        @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ulangi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="demala-profile-btn"><i class="bi bi-key"></i> Ganti Password</button>
                </form>

            </div>

        </div>
    </div>


    @push('scripts')
        <script>
            // Pratinjau foto sebelum disimpan
            document.getElementById('photoInput').addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (!file) return;
                const img = document.getElementById('photoPreview');
                const initial = document.getElementById('photoInitial');
                img.src = URL.createObjectURL(file);
                img.style.display = 'block';
                if (initial) initial.style.display = 'none';
            });
        </script>
    @endpush

@endsection