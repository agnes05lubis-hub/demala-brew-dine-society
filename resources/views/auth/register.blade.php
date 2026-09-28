@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Daftar')

@section('content')

<section class="dbds-auth">
    <div class="container">
        <div class="dbds-auth-card">

            <div class="dbds-auth-badge">D</div>

            <p class="dbds-eyebrow text-center">Bergabung</p>
            <h1 class="dbds-auth-title">Daftar Akun Demala</h1>
            <p class="dbds-auth-sub">
                Buat akun untuk menulis ulasan dan memesan meja dengan lebih mudah.
            </p>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="dbds-auth-field">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-person"></i>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="form-control dbds-input" placeholder="Masukkan nama" required>
                    </div>
                    @error('name')<small class="dbds-auth-error">{{ $message }}</small>@enderror
                </div>

                <div class="dbds-auth-field">
                    <label class="form-label">Email</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control dbds-input" placeholder="Masukkan email" required>
                    </div>
                    @error('email')<small class="dbds-auth-error">{{ $message }}</small>@enderror
                </div>

                <div class="dbds-auth-field">
                    <label class="form-label">Password</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="regPass" name="password"
                               class="form-control dbds-input" placeholder="Minimal 8 karakter" required>
                        <button type="button" class="dbds-auth-eye" data-target="regPass">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                   <div class="dbds-auth-meter"><span id="regMeter"></span></div>

<ul class="dbds-auth-rules" id="regRules">
    <li data-rule="len"><i class="bi bi-circle"></i> Minimal 8 karakter</li>
    <li data-rule="upper"><i class="bi bi-circle"></i> Huruf besar (A-Z)</li>
    <li data-rule="lower"><i class="bi bi-circle"></i> Huruf kecil (a-z)</li>
    <li data-rule="num"><i class="bi bi-circle"></i> Angka (0-9)</li>
    <li data-rule="sym"><i class="bi bi-circle"></i> Simbol (! @ # $ % dst.)</li>
</ul>
                    @error('password')<small class="dbds-auth-error">{{ $message }}</small>@enderror
                </div>

                <div class="dbds-auth-field">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="dbds-auth-input">
                        <i class="bi bi-shield-lock"></i>
                        <input type="password" id="regPass2" name="password_confirmation"
                               class="form-control dbds-input" placeholder="Ulangi password" required>
                        <button type="button" class="dbds-auth-eye" data-target="regPass2">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn dbds-btn-brass dbds-auth-submit">
                    Daftar Sekarang
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <p class="dbds-auth-switch">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login di sini</a>
            </p>

        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // tombol mata
    document.querySelectorAll('.dbds-auth-eye').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const input = document.getElementById(btn.dataset.target);
            const icon  = btn.querySelector('i');
            const show  = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    });

    // cek syarat password
    const pass  = document.getElementById('regPass');
    const meter = document.getElementById('regMeter');
    const rules = document.querySelectorAll('#regRules li');

    const checks = {
        len:   v => v.length >= 8,
        upper: v => /[A-Z]/.test(v),
        lower: v => /[a-z]/.test(v),
        num:   v => /[0-9]/.test(v),
        sym:   v => /[^A-Za-z0-9]/.test(v)
    };

    pass.addEventListener('input', function () {
        const v = pass.value;
        let score = 0;

        rules.forEach(function (li) {
            const ok = checks[li.dataset.rule](v);
            li.classList.toggle('ok', ok);
            li.querySelector('i').className = ok ? 'bi bi-check-circle-fill' : 'bi bi-circle';
            if (ok) score++;
        });

        const colors = ['#e74c3c', '#e74c3c', '#e67e22', '#f1c40f', '#2e7d5b', '#2e7d5b'];
        meter.style.width      = (score * 20) + '%';
        meter.style.background = colors[score];
    });

});
</script>

@endsection