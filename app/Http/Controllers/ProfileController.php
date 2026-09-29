<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Tampilkan halaman profil
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Simpan nama, email, dan foto
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', Rule::unique('users', 'email')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $user->name  = $data['name'];
        $user->email = $data['email'];

        if ($request->hasFile('photo')) {
            // hapus foto lama kalau ada
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = $request->file('photo')->store('profile-photos', 'public');
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Hapus foto (kembali ke huruf inisial)
    public function removePhoto()
    {
        $user = Auth::user();

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
            $user->photo = null;
            $user->save();
        }

        return back()->with('success', 'Foto profil dihapus.');
    }

    // Ganti password
    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ], [
            'current_password.current_password' => 'Password lama tidak sesuai.',
            'password.confirmed'                => 'Konfirmasi password tidak sama.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password berhasil diganti.');
    }
}