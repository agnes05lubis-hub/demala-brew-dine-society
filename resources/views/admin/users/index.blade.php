@extends('layouts.admin')

@section('title', 'Pengguna & Karyawan')

@section('admin_page_title', 'Pengguna & Karyawan')


@section('content')

<div class="adm-page">

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="flash" style="background:#fdecea;color:#b03a2e">
            {{ $errors->first() }}
        </div>
    @endif


    <!-- TAB + TOMBOL TAMBAH -->

    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">

        <div class="tabs">
            <a href="{{ route('admin.users.index') }}" class="{{ $tipe === 'semua' ? 'on' : '' }}">
                Semua ({{ $count['semua'] }})
            </a>
            <a href="{{ route('admin.users.index', ['tipe' => 'karyawan']) }}" class="{{ $tipe === 'karyawan' ? 'on' : '' }}">
                Karyawan ({{ $count['karyawan'] }})
            </a>
            <a href="{{ route('admin.users.index', ['tipe' => 'pelanggan']) }}" class="{{ $tipe === 'pelanggan' ? 'on' : '' }}">
                Pelanggan ({{ $count['pelanggan'] }})
            </a>
        </div>

        <button class="demala-profile-btn" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-person-plus"></i> Tambah Karyawan
        </button>

    </div>


    <!-- TABEL -->

    <table>
        <tr>
            <th>Pengguna</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Terdaftar</th>
            <th></th>
        </tr>

        @forelse($users as $u)
            <tr>
                <td>
                    <div class="demala-user-cell">
                        <span class="demala-user-avatar">
                            @if($u->photo)
                                <img src="{{ asset('storage/' . $u->photo) }}" alt="">
                            @else
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            @endif
                        </span>
                        {{ $u->name }}
                    </div>
                </td>
                <td>{{ $u->email }}</td>
                <td>
                    @if($u->role === 'admin')
                        <span class="demala-pill demala-pill-navy">Administrator</span>
                    @elseif($u->jabatan)
                        <span class="demala-pill demala-pill-gold">{{ $u->jabatan }}</span>
                    @else
                        <span class="text-muted">Pelanggan</span>
                    @endif
                </td>
                <td>
                    @if($u->aktif ?? true)
                        <span class="demala-pill demala-pill-green">Aktif</span>
                    @else
                        <span class="demala-pill demala-pill-red">Nonaktif</span>
                    @endif
                </td>
                <td>{{ $u->created_at->format('d M Y') }}</td>
                <td class="text-end">
                    @if($u->role !== 'admin')
                        <button class="btn btn-sm btn-outline-secondary btn-edit"
                                data-bs-toggle="modal" data-bs-target="#modalEdit"
                                data-action="{{ route('admin.users.update', $u) }}"
                                data-name="{{ $u->name }}"
                                data-jabatan="{{ $u->jabatan }}">
                            Edit
                        </button>

                        <form method="POST" action="{{ route('admin.users.toggle', $u) }}" class="d-inline">
                            @csrf @method('PATCH')
                            <button class="btn btn-sm {{ ($u->aktif ?? true) ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                    onclick="return confirm('Yakin ubah status akun ini?')">
                                {{ ($u->aktif ?? true) ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.users.destroy', $u) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus akun ini secara permanen? Tindakan ini tidak bisa dibatalkan.')">
                                Hapus
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data.</td></tr>
        @endforelse
    </table>


    <!-- HALAMAN -->

    <div class="pager">
        @if($users->previousPageUrl())
            <a href="{{ $users->previousPageUrl() }}">← Sebelumnya</a>
        @endif
        @if($users->nextPageUrl())
            <a href="{{ $users->nextPageUrl() }}">Berikutnya →</a>
        @endif
    </div>

</div>


<!-- ================= MODAL TAMBAH ================= -->

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('admin.users.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan" class="form-select" required>
                        @foreach($jabatanList as $j)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label class="form-label">Password Awal</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-muted">Minimal 8 karakter: huruf besar, huruf kecil, angka, simbol.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button class="demala-profile-btn">Simpan</button>
            </div>
        </form>
    </div>
</div>


<!-- ================= MODAL EDIT ================= -->

<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="formEdit" class="modal-content">
            @csrf @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" id="editName" class="form-control" required>
                </div>
                <div class="mb-1">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan" id="editJabatan" class="form-select">
                        <option value="">Pelanggan (bukan karyawan)</option>
                        @foreach($jabatanList as $j)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button class="demala-profile-btn">Simpan</button>
            </div>
        </form>
    </div>
</div>


@push('scripts')
    <script>
        // Isi form Edit dengan data baris yang diklik
        document.querySelectorAll('.btn-edit').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('formEdit').action = btn.dataset.action;
                document.getElementById('editName').value = btn.dataset.name;
                document.getElementById('editJabatan').value = btn.dataset.jabatan || '';
            });
        });
    </script>
@endpush

@endsection