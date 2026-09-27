@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Beranda')

@section('content')

<!-- =========================================================
     HERO BANNER
========================================================= -->
<section class="dbds-hero">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-6">
                <p class="dbds-eyebrow">Est. Sejak Secangkir Pertama</p>

                <h1 class="dbds-hero-title">
                    Tempatnya kerja<br>
                    nongkrong,<br>
                    dan semua cerita.
                </h1>

                <p class="dbds-hero-lead">
                    Demala Brew &amp; Dine Society bukan cuma kafe.
                    Ini ruang buat kamu yang mau kerja pake wifi + colokan, meeting sama tim, nugas bareng, atau sekedar nongkrong sampe malem.
                    Ada kopi racikan, snack, dan berbagai variasi menu lainnya
                    dijamin bikin kamu betah ada nyaman nongkrong disini.
                </p>

                <div class="dbds-hero-status">
                    <span class="dbds-status-dot" id="dbdsStatusDot"></span>
                    <span id="dbdsStatusText">Memuat...</span>
                    <span class="dbds-hero-status-sep">&bull;</span>
                    <span class="dbds-hero-clock" id="dbdsClock">00:00:00</span>
                </div>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ url('/menu') }}" class="btn dbds-btn-brass">
                        Lihat Menu Kami
                    </a>

                    <a href="{{ url('/kontak') }}" class="btn dbds-btn-outline">
                        Reservasi Meja
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="dbds-hero-frame">

                    <img
                        src="{{ asset('storage/images/demala-malam.webp') }}"
                        alt="Suasana Demala Brew & Dine Society"
                        class="dbds-hero-img"
                    >

                </div>
            </div>

        </div>
    </div>
</section>


<script>
    function dbdsUpdateClock() {
        const now = new Date();

        const h = String(now.getHours()).padStart(2, '0');
        const m = String(now.getMinutes()).padStart(2, '0');
        const s = String(now.getSeconds()).padStart(2, '0');

        document.getElementById('dbdsClock').textContent =
            `${h}:${m}:${s}`;

        const totalMinutes =
            now.getHours() * 60 + now.getMinutes();

        const openMin = 8 * 60;
        const closeMin = 4 * 60;

        const dotEl =
            document.getElementById('dbdsStatusDot');

        const textEl =
            document.getElementById('dbdsStatusText');

        if (totalMinutes >= openMin || totalMinutes < closeMin) {

            textEl.textContent = 'Sedang Buka';

            dotEl.className =
                'dbds-status-dot dbds-dot-open';

        } else {

            textEl.textContent = 'Sedang Tutup';

            dotEl.className =
                'dbds-status-dot dbds-dot-closed';
        }
    }

    dbdsUpdateClock();
    setInterval(dbdsUpdateClock, 1000);
</script>

<!-- =========================================================
     MENU SIGNATURE — CAROUSEL
========================================================= -->
<section class="dbds-section-alt">
    <div class="container">

        <div class="row align-items-end mb-5 gy-3">

            <div class="col-lg-8">
                <p class="dbds-eyebrow">
                    Signature Menu
                </p>

                <h2 class="dbds-section-title">
                    Sajian Pilihan Demala
                </h2>

                <p class="dbds-body-text mb-0">
                    Beberapa sajian yang menjadi pilihan untuk menemani
                    waktu santai, ngobrol, maupun bekerja.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a href="{{ url('/menu') }}" class="dbds-link-arrow">
                    Lihat semua menu →
                </a>
            </div>

        </div>


        <!-- CAROUSEL -->
        <div id="dbdsSignatureCarousel"
             class="carousel slide dbds-signature-carousel"
             data-bs-ride="carousel"
             data-bs-interval="2000">

            <div class="carousel-inner">


              <!-- SLIDE 1 - FOOD -->
<div class="carousel-item active">
    <div class="row gy-4">

        <!-- MENU 1 - FOOD -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=food') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/salmon.png') }}"
                         alt="Pan-Seared Norwegian Salmon">
                    <div class="dbds-menu-card-body">
                        <h5>Pan-Seared Norwegian Salmon</h5>
                        <span class="dbds-price">Rp 45.000</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- MENU 2 - FOOD -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=food') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/heritage-fried-rice.jpeg') }}"
                         alt="Heritage Kampung Fried Rice">
                    <div class="dbds-menu-card-body">
                        <h5>Heritage Kampung Fried Rice</h5>
                        <span class="dbds-price">Rp 30.000</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- MENU 3 - FOOD -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=food') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/gourmet-soups.jpeg') }}"
                         alt="Imperial Asparagus Soup">
                    <div class="dbds-menu-card-body">
                        <h5>Imperial Asparagus Soup</h5>
                        <span class="dbds-price">Rp 26.000</span>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- SLIDE 2 -->
<div class="carousel-item">
    <div class="row gy-4">

        <!-- MENU 4 - FOOD -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=food') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/grilled.jpeg') }}"
                         alt="Grilled Chicken">
                    <div class="dbds-menu-card-body">
                        <h5>Grilled Chicken</h5>
                        <span class="dbds-price">Rp 45.000</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- MENU 5 - DRINK -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=drink') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/strawberry.jpeg') }}"
                         alt="Strawberry Matcha">
                    <div class="dbds-menu-card-body">
                        <h5>Strawberry Matcha</h5>
                        <span class="dbds-price">Rp 35.000</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- MENU 6 - DRINK -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=drink') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/roasted-demala.jpeg') }}"
                         alt="Roasted Almond Butterscotch Latte">
                    <div class="dbds-menu-card-body">
                        <h5>Roasted Almond Butterscotch Latte</h5>
                        <span class="dbds-price">Rp 38.000</span>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<!-- SLIDE 3 -->
<div class="carousel-item">
    <div class="row gy-4">

        <!-- MENU 7 - DRINK -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=drink') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/sanger.jpeg') }}"
                         alt="heritago sanger espresso">
                    <div class="dbds-menu-card-body">
                        <h5>heritago sanger espresso</h5>
                        <span class="dbds-price">Rp 28.000</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- MENU 8 - DRINK -->
        <div class="col-md-4">
            <a href="{{ url('/menu?category=drink') }}" 
               class="text-decoration-none"
               style="display: block;">
                <div class="dbds-menu-card">
                    <img src="{{ asset('storage/images/avocado.jpeg') }}"
                         alt="Creamy Hass Avocado Puree">
                    <div class="dbds-menu-card-body">
                        <h5>Creamy Hass Avocado Puree</h5>
                        <span class="dbds-price">Rp 28.000</span>
                    </div>
                </div>
            </a>
        </div>

       <!-- CTA CARD -->
<div class="col-md-4">
    <div class="dbds-signature-more-card">

        <p class="dbds-eyebrow">
            Explore More
        </p>

        <h3>
            Temukan Semua Menu Kami
        </h3>

        <a href="{{ url('/menu') }}" class="btn dbds-btn-brass">
            Lihat Semua Menu →
        </a>

    </div>
</div>
    </div>
</div>

        </div>

    </div>
</section>

<!-- =========================================================
     TENTANG DEMALA
========================================================= -->
<section class="dbds-section">
    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-6">

                <img
                    src="{{ asset('storage/images/demala-beranda.jpeg') }}"
                    alt="Interior Demala Brew & Dine Society"
                    class="dbds-about-img"
                >

            </div>


            <div class="col-lg-6">

                <p class="dbds-eyebrow">
                    Tentang Kami
                </p>

                <h2 class="dbds-section-title mb-4">
                    Kerja Bisa. Nongkrong Bisa. Semua Bisa.
                </h2>

                <p class="dbds-body-text">
                    Demala Brew &amp; Dine Society lebih dari sekedar kafe.
                     kami nyediain tempat nyaman buat kamu kerja, meeting, diskusi, atau sekedar ngobrol santai.
                </p>

                <p class="dbds-body-text">
                    Dengan kopi racikan, hidangan rumahan, dan suasana yang bikin betah, Demala jadi rumah kedua kamu di Pekanbaru.
                </p>

                <a href="{{ url('/tentang') }}"
                   class="btn dbds-btn-brass mt-2">
                    Kenal Lebih Dekat
                </a>

            </div>

        </div>

    </div>
</section>


<!-- =========================================================
     TESTIMONI
========================================================= -->
<section class="dbds-section-alt">
    <div class="container">

        <div class="text-center mb-5">

            <p class="dbds-eyebrow">
                Kata Mereka
            </p>

            <h2 class="dbds-section-title">
                Cerita dari Meja Demala
            </h2>

        </div>


        <div class="row gy-4">

            <!-- TESTIMONI 1 -->
            <div class="col-md-4">

                <div class="dbds-value-card">

                    <div class="mb-3">
                        <i class="bi bi-quote"
                           style="font-size: 2rem; color: var(--brass);">
                        </i>
                    </div>

                    <p>
                        "Tempatnya nyaman banget untuk ngobrol
                        lama sambil menikmati kopi."
                    </p>

                    <h5 class="mt-4 mb-0">
                        Pelanggan Demala
                    </h5>

                </div>

            </div>


            <!-- TESTIMONI 2 -->
            <div class="col-md-4">

                <div class="dbds-value-card">

                    <div class="mb-3">
                        <i class="bi bi-quote"
                           style="font-size: 2rem; color: var(--brass);">
                        </i>
                    </div>

                    <p>
                        "Suasananya tenang dan cocok untuk
                        nongkrong maupun mengerjakan tugas."
                    </p>

                    <h5 class="mt-4 mb-0">
                        Pelanggan Demala
                    </h5>

                </div>

            </div>


            <!-- TESTIMONI 3 -->
            <div class="col-md-4">

                <div class="dbds-value-card">

                    <div class="mb-3">
                        <i class="bi bi-quote"
                           style="font-size: 2rem; color: var(--brass);">
                        </i>
                    </div>

                    <p>
                        "Kopi dan makanannya cocok untuk
                        menemani waktu santai bersama teman."
                    </p>

                    <h5 class="mt-4 mb-0">
                        Pelanggan Demala
                    </h5>

                </div>

            </div>

        </div>

    </div>
</section>


<!-- =========================================================
     GALERI FOTO + VIDEO — REDESIGN
     VIDEO HERO + 3 FOTO GRID
========================================================= -->
<section class="dbds-section dbds-moments-section" id="galeri-beranda">
    <div class="container">

        <div class="row align-items-end mb-5 gy-3">
            <div class="col-lg-8">
                <p class="dbds-eyebrow">
                    Demala Moments
                </p>

                <h2 class="dbds-section-title">
                    Cuplikan Suasana Demala
                </h2>

                <p class="dbds-body-text mb-0">
                    Sedikit gambaran tentang ruang, suasana, kopi, dan cerita yang hadir di Demala.
                </p>
            </div>
        </div>

        <!-- GRID BARU: VIDEO HERO + 3 FOTO -->
        <div class="dbds-moments-grid">

            <!-- VIDEO HERO — FULL WIDTH -->
            <div class="dbds-moment-video">
                <div class="dbds-video-wrap">
                   <video
                        id="dbdsMomentsVideo"
                        autoplay
                        muted
                        loop
                        playsinline
                        preload="metadata"
                    >
                        <source src="{{ asset('storage/videos/demala-video.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>

                    <button type="button" class="dbds-video-sound" id="dbdsVideoSound">
                        <i class="bi bi-volume-mute-fill"></i>
                        <span>Nyalakan Suara</span>
                    </button>
                </div>
            </div>

            <!-- FOTO 1 - PELANGGAN -->
            <div class="dbds-moment-photo">
                  <img src="{{ asset('storage/images/demala-orang.jpeg') }}"
                         alt="COSTUMER DEMALA"
                    >
            </div>
        

            <!-- FOTO 2 - INTERIOR -->
            <div class="dbds-moment-photo">
                  <img src="{{ asset('storage/images/ruang.jpeg') }}"
                         alt="INTERTIOR"
                   >
            </div>

            <!-- FOTO 3 -  MENU DEMALA -->
            <div class="dbds-moment-photo">
                <img
                 src="{{ asset('storage/images/buku-demala.jpg') }}"
                    alt="BUKU MENU DEMALA"
                >
            </div>

              <!-- CTA GALERI TENTANG -->
            <a href="{{ url('/tentang') }}#galeri" class="dbds-moment-cta">
                <span class="dbds-moment-cta-overlay">
                    <span class="dbds-eyebrow">Explore More</span>
                    <strong>Lihat Suasana Demala <span>→</span></strong>
                    <small>Jelajahi galeri lengkap Demala.</small>
                </span>
            </a>

        </div>

    </div>
</section>


<!-- =========================================================
     LOKASI SINGKAT
========================================================= -->
<section class="dbds-section-alt">
    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-6">

                <p class="dbds-eyebrow">
                    Temukan Kami
                </p>

                <h2 class="dbds-section-title mb-4">
                    Mampir dan nikmati suasananya.
                </h2>

                <p class="dbds-body-text">
                    Datang langsung ke Demala Brew &amp; Dine Society
                    dan nikmati kopi serta hidangan pilihan kami
                    dalam suasana yang nyaman.
                </p>


                <ul class="list-unstyled dbds-contact-list mt-4">

                    <li>
                        <i class="bi bi-geo-alt"></i>

                        <div>
                            <strong>Lokasi</strong>

                            <p>
                                Silakan lihat alamat lengkap
                                dan petunjuk lokasi kami.
                            </p>
                        </div>
                    </li>


                    <li>
                        <i class="bi bi-clock"></i>

                        <div>
                            <strong>Jam Operasional</strong>

                            <p>
                                Setiap hari, 08.00 — 04.00
                            </p>
                        </div>
                    </li>

                </ul>


                <a href="{{ url('/kontak') }}"
                   class="btn dbds-btn-brass mt-3">
                    Lihat Lokasi &amp; Kontak
                </a>

            </div>


            <div class="col-lg-6">

                <div class="dbds-form-card text-center">

                    <i class="bi bi-geo-alt"
                       style="font-size: 3rem; color: var(--brass);">
                    </i>

                    <h3 class="mt-3">
                        Demala Brew &amp; Dine Society
                    </h3>

                    <p class="dbds-body-text">
                        Tempat kopi, makanan, dan cerita
                        bertemu dalam satu ruang.
                    </p>

                    <a href="{{ url('/kontak') }}"
                       class="dbds-link-arrow">
                        Buka halaman kontak →
                    </a>

                </div>

            </div>

        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const video = document.getElementById('dbdsMomentsVideo');
    const soundButton = document.getElementById('dbdsVideoSound');

    if (video && soundButton) {
        soundButton.addEventListener('click', function () {
            video.muted = !video.muted;

            if (video.muted) {
                soundButton.innerHTML = '<i class="bi bi-volume-mute-fill"></i><span>Nyalakan Suara</span>';
            } else {
                video.volume = 1;
                soundButton.innerHTML = '<i class="bi bi-volume-up-fill"></i><span>Matikan Suara</span>';
            }
        });
    }

    const elements = document.querySelectorAll(
        '.dbds-section, .dbds-section-alt'
    );

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add('dbds-visible');

                observer.unobserve(entry.target);
            }

        });

    }, {
        threshold: 0.15
    });

    elements.forEach(element => {

        element.classList.add('dbds-reveal');

        observer.observe(element);

    });

});
</script>


@endsection