@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Login')

@section('content')

<section class="dbds-auth">
    <div class="container">
        <div class="dbds-auth-card">

            <div class="dbds-auth-badge">D</div>

            <p class="dbds-eyebrow text-center">Selamat Datang</p>
            <h1 class="dbds-auth-title">Login Demala Brew&amp;Dine</h1>
            <p class="dbds-auth-sub">
                Masuk untuk menulis ulasan dan memesan meja.
            </p>

            {{-- Error --}}
            @if ($errors->any())
                <div class="dbds-auth-alert" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Form login --}}
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="dbds-auth-field">
                    <label for="email" class="form-label">Email</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-envelope"></i>
                        <input
                            type="email"
                            class="form-control dbds-input"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required>
                    </div>
                </div>

                <div class="dbds-auth-field">
                    <label for="password" class="form-label">Password</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-lock"></i>
                        <input
                            type="password"
                            class="form-control dbds-input"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>
                        <button
                            type="button"
                            class="dbds-auth-eye"
                            id="togglePassword"
                            tabindex="-1"
                            aria-label="Tampilkan atau sembunyikan password">
                            <i class="bi bi-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn dbds-btn-brass dbds-auth-submit">
                    Login
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            {{-- Daftar --}}
            <div class="dbds-auth-divider"><span>atau</span></div>

            <a href="{{ route('register') }}" class="dbds-auth-register">
                <i class="bi bi-person-plus"></i>
                <div>
                    <strong>Belum punya akun?</strong>
                    <small>Daftar gratis dan mulai menulis ulasan</small>
                </div>
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>
    </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('togglePasswordIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });
</script>
@endsection