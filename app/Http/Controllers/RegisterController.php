<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
    'name'     => 'required|string|max:100',
    'email'    => 'required|email|unique:users,email',
    'password' => [
        'required',
        'min:8',
        'confirmed',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/',
    ],
], [
    'password.min'       => 'Password minimal 8 karakter.',
    'password.confirmed' => 'Konfirmasi password tidak sama.',
    'password.regex'     => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
    'email.unique'       => 'Email ini sudah terdaftar.',
]);

        Auth::login($user);

        return redirect('/')->with('success', 'Akun berhasil dibuat. Selamat datang!');
    }
}