<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    // Daftar jabatan yang boleh dipilih
    private array $jabatanList = ['Kasir', 'Pelayan', 'Barista', 'Koki', 'Manajer'];

    // ---------- DAFTAR ----------
    public function index(Request $request)
    {
        $tipe  = $request->query('tipe', 'semua');
        $query = User::query();

        if ($tipe === 'karyawan') {
            $query->where('role', 'user')->whereNotNull('jabatan');
        } elseif ($tipe === 'pelanggan') {
            $query->where('role', 'user')->whereNull('jabatan');
        }

        $users = $query->latest()->paginate(15)->withQueryString();

        $count = [
            'semua'     => User::count(),
            'karyawan'  => User::where('role', 'user')->whereNotNull('jabatan')->count(),
            'pelanggan' => User::where('role', 'user')->whereNull('jabatan')->count(),
        ];

        return view('admin.users.index', [
            'users'       => $users,
            'tipe'        => $tipe,
            'count'       => $count,
            'jabatanList' => $this->jabatanList,
        ]);
    }

    // ---------- TAMBAH KARYAWAN ----------
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', 'unique:users,email'],
            'jabatan'  => ['required', Rule::in($this->jabatanList)],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $user = new User();
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role     = 'user';
        $user->jabatan  = $data['jabatan'];
        $user->aktif    = true;
        $user->save();

        return redirect()->route('admin.users.index', ['tipe' => 'karyawan'])
            ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // ---------- EDIT NAMA & JABATAN ----------
    public function update(Request $request, User $user)
    {
        if ($user->role === 'admin') {
            return back()->withErrors(['name' => 'Akun admin tidak bisa diubah dari sini.']);
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'jabatan' => ['nullable', Rule::in($this->jabatanList)],
        ]);

        $user->name    = $data['name'];
        $user->jabatan = $data['jabatan'] ?: null; // kosong = pelanggan biasa
        $user->save();

        return back()->with('success', 'Data berhasil diperbarui.');
    }

    // ---------- AKTIF / NONAKTIF ----------
    public function toggle(User $user)
    {
        if ($user->role === 'admin' || $user->id === Auth::id()) {
            return back()->withErrors(['name' => 'Akun ini tidak bisa dinonaktifkan.']);
        }

        $user->aktif = ! $user->aktif;
        $user->save();

        return back()->with('success', $user->aktif ? 'Akun diaktifkan.' : 'Akun dinonaktifkan.');
    }

    // ---------- HAPUS AKUN ----------
    public function destroy(User $user)
    {
        if ($user->role === 'admin' || $user->id === Auth::id()) {
            return back()->withErrors(['name' => 'Akun ini tidak bisa dihapus.']);
        }

        $photo = $user->photo;

        try {
            $user->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                'name' => 'Akun ini tidak bisa dihapus karena masih punya data terkait (ulasan/reservasi). Nonaktifkan saja.',
            ]);
        }

        // hapus file foto setelah akun berhasil dihapus
        if ($photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($photo);
        }

        return back()->with('success', 'Akun berhasil dihapus.');
    }
}