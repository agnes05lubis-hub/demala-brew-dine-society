<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 'aktif' => true : hanya akun yang aktif yang boleh masuk
        if (Auth::attempt($credentials + ['aktif' => true])) {
            // Cegah session fixation attack
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Login berhasil!');
            }

            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        // Gagal masuk. Kalau email & password sebenarnya benar,
        // berarti akunnya yang dinonaktifkan.
        if (Auth::validate($credentials)) {
            return back()->withErrors([
                'email' => 'Akun kamu sedang dinonaktifkan. Silakan hubungi admin.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout berhasil!');
    }
}