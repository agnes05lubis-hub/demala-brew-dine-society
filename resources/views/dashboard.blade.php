@extends('layouts.user')

@section('title', 'Beranda')

@section('page_title', 'Beranda')


@section('content')

    <!-- =====================================================
         USER BIASA — SEDERHANA
    ===================================================== -->

    <div class="demala-dashboard-welcome">
        <div class="demala-dashboard-eyebrow">Demala Brew & Dine Society</div>
        <h2>Selamat datang, {{ Auth::user()->name }}</h2>
        <p>Jelajahi menu Demala Brew & Dine Society.</p>
    </div>

    <div class="demala-user-actions">
        <a href="{{ route('menu.index') }}" class="demala-dashboard-menu-btn">
            <i class="bi bi-cup-hot"></i>
            Lihat Semua Menu
        </a>

        <a href="{{ url('/') }}" class="demala-dashboard-menu-btn demala-btn-outline">
            <i class="bi bi-box-arrow-up-right"></i>
            Lihat Website
        </a>
    </div>

@endsection