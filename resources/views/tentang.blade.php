@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Tentang')

@section('content')

    <section class="dbds-page-header">
        <div class="container text-center">
            <p class="dbds-eyebrow">Kisah Kami</p>
            <h1 class="dbds-page-title">Dari Dapur Kecil Menjadi Tempat Singgah</h1>
        </div>
    </section>

    <section class="dbds-section dbds-section-tight">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="dbds-about-media">
                        <video
                            class="dbds-about-img"
                            autoplay
                            muted
                            loop
                            playsinline
                            controls
                        >
                            <source
                                src="{{ asset('storage/videos/video-tentang.mp4') }}"
                                type="video/mp4"
                            >
                        </video>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="dbds-eyebrow">Sejak Awal</p>
                    <h2 class="dbds-section-title">Berawal dari Meja Dapur Rumah</h2>
                    <p class="dbds-body-text">
                        Demala Brew &amp; Dine Society dimulai dari kebiasaan sederhana: menyeduh kopi
                        untuk teman-teman yang mampir setiap sore. Dari situ, tercipta keinginan untuk
                        membagikan rasa itu kepada lebih banyak orang — bukan hanya kopi yang enak,
                        tapi juga tempat yang membuat orang betah berlama-lama.
                    </p>
                    <p class="dbds-body-text mb-0">
                        Kini, kami hadir sebagai ruang bersama: tempat bekerja, berkumpul, atau sekadar
                        duduk sendirian menikmati waktu. Setiap menu kami masak dan seduh dengan cara yang
                        sama seperti dulu — pelan, dan penuh perhatian.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="dbds-section-alt dbds-section-tight">
        <div class="container">
            <div class="row text-center mb-4">
                <p class="dbds-eyebrow">Nilai Kami</p>
                <h2 class="dbds-section-title">Yang Kami Pegang Teguh</h2>
            </div>
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="dbds-value-card dbds-value-card-sm">
                        <i class="bi bi-flower1 dbds-strip-icon"></i>
                        <h5>Bahan Segar</h5>
                        <p>Belanja langsung dari pasar setiap pagi, tanpa bahan pengawet.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbds-value-card dbds-value-card-sm">
                        <i class="bi bi-hourglass-split dbds-strip-icon"></i>
                        <h5>Tanpa Terburu-buru</h5>
                        <p>Kami percaya rasa terbaik butuh waktu, bukan jalan pintas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dbds-value-card dbds-value-card-sm">
                        <i class="bi bi-heart dbds-strip-icon"></i>
                        <h5>Keramahan Tulus</h5>
                        <p>Setiap tamu kami sambut seperti kerabat yang datang berkunjung.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dbds-section dbds-section-tight">
        <div class="container">
            <div class="row text-center mb-4">
                <p class="dbds-eyebrow">Kenapa Demala Brew</p>
                <h2 class="dbds-section-title">Keunggulan Utama Kami</h2>
            </div>
            <div class="row gy-3">
                <div class="col-md-6 col-lg-3">
                    <div class="dbds-feature-card dbds-feature-card-sm">
                        <span class="dbds-feature-num">01</span>
                        <h5>Biji Kopi Pilihan</h5>
                        <p>Disangrai dalam batch kecil agar rasa selalu segar dan konsisten.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dbds-feature-card dbds-feature-card-sm">
                        <span class="dbds-feature-num">02</span>
                        <h5>Buka Hingga Larut</h5>
                        <p>Setiap hari, 08.00–04.00, tempat singgah kapan pun kamu butuh.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dbds-feature-card dbds-feature-card-sm">
                        <span class="dbds-feature-num">03</span>
                        <h5>Ruang Nyaman</h5>
                        <p>Kursi empuk, pencahayaan hangat, cocok untuk kerja maupun santai.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dbds-feature-card dbds-feature-card-sm">
                        <span class="dbds-feature-num">04</span>
                        <h5>Pelayanan Ramah</h5>
                        <p>Tim kami mengenal wajah pelanggan tetap seperti kerabat sendiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="dbds-section-alt dbds-section-tight">
    <div class="container">

        {{-- JUDUL --}}
        <div class="row text-center mb-4">
            <div class="col-12">
                <p class="dbds-eyebrow">Galeri</p>

                <h2 class="dbds-section-title">
                    Suasana Demala Brew
                </h2>
            </div>
        </div>

        {{-- GALERI --}}
        <div
            id="dbdsGalleryCarousel"
            class="carousel slide dbds-gallery-carousel"
            data-bs-ride="carousel"
            data-bs-interval="4000"
        >

            {{-- INDICATORS --}}
            <div class="carousel-indicators">

                <button
                    type="button"
                    data-bs-target="#dbdsGalleryCarousel"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1">
                </button>

                <button
                    type="button"
                    data-bs-target="#dbdsGalleryCarousel"
                    data-bs-slide-to="1"
                    aria-label="Slide 2">
                </button>

                <button
                    type="button"
                    data-bs-target="#dbdsGalleryCarousel"
                    data-bs-slide-to="2"
                    aria-label="Slide 3">
                </button>

                <button
                    type="button"
                    data-bs-target="#dbdsGalleryCarousel"
                    data-bs-slide-to="3"
                    aria-label="Slide 4">
                </button>

            </div>


            {{-- SLIDES --}}
            <div class="carousel-inner">

                {{-- SLIDE 1 --}}
                <div class="carousel-item active">

                    <div class="dbds-moment-photo">
                        <img
                            src="{{ asset('storage/images/demala-malam.webp') }}"
                            alt="Suasana Demala Brew pada malam hari"
                        >
                    </div>

                    <div class="carousel-caption">
                        <p>Suasana Demala Brew</p>
                    </div>

                </div>


                {{-- SLIDE 2 --}}
                <div class="carousel-item">

                    <div class="dbds-moment-photo">
                        <img
                            src="{{ asset('storage/images/ruang.jpeg') }}"
                            alt="Ruang kerja bersama di Demala Brew"
                        >
                    </div>

                    <div class="carousel-caption">
                        <p>Ruang Kerja Bersama</p>
                    </div>

                </div>


                {{-- SLIDE 3 --}}
                <div class="carousel-item">

                    <div class="dbds-moment-photo">
                        <img
                            src="{{ asset('storage/images/buku-demala.jpg') }}"
                            alt="Buku menu Demala Brew"
                        >
                    </div>

                    <div class="carousel-caption">
                        <p>Menu &amp; Cerita Demala</p>
                    </div>

                </div>


                {{-- SLIDE 4 --}}
                <div class="carousel-item">

                    <div class="dbds-moment-photo">
                        <img
                            src="{{ asset('storage/images/karywan-demala.jpeg') }}"
                            alt="Aktivitas karyawan Demala Brew"
                        >
                    </div>

                    <div class="carousel-caption">
                        <p>Di Balik Layanan Demala</p>
                    </div>

                </div>

            </div>


            {{-- TOMBOL PREV --}}
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#dbdsGalleryCarousel"
                data-bs-slide="prev"
                aria-label="Foto sebelumnya"
            >
                <span class="dbds-carousel-arrow">
                    <i class="bi bi-chevron-left"></i>
                </span>
            </button>


            {{-- TOMBOL NEXT --}}
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#dbdsGalleryCarousel"
                data-bs-slide="next"
                aria-label="Foto berikutnya"
            >
                <span class="dbds-carousel-arrow">
                    <i class="bi bi-chevron-right"></i>
                </span>
            </button>

        </div>

    </div>
</section>

    {{-- =========================================================
         ULASAN PELANGGAN
    ========================================================= --}}
    @php
        $approvedReviews = \App\Models\Review::where('is_approved', true)
            ->where('status', 'approved')
            ->latest()
            ->get();

        $reviewCount = $approvedReviews->count();

        $averageRating = $reviewCount > 0
            ? round($approvedReviews->avg('rating'), 1)
            : 0;
    @endphp

    <section class="dbds-section dbds-review-section">
        <div class="container">

            <div class="dbds-review-heading">
                <div>
                    <p class="dbds-eyebrow mb-2">Kata Mereka</p>
                    <h2 class="dbds-section-title mb-2">Ulasan Pelanggan</h2>
                    <p class="dbds-review-subtitle">
                        Cerita kecil dari mereka yang pernah menikmati waktu di Demala.
                    </p>
                </div>

                <div class="dbds-rating-summary">
                    <div class="dbds-rating-number">
                        {{ $averageRating ?: '—' }}
                    </div>

                    <div>
                        <div class="dbds-stars" aria-label="Rating {{ $averageRating }} dari 5">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        </div>
                        <span>{{ $reviewCount }} ulasan</span>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="dbds-review-success">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($approvedReviews->count() > 0)
                <div class="dbds-review-grid">
                    @foreach($approvedReviews->take(3) as $review)
                        <article class="dbds-review-card">
                            <div class="dbds-review-card-top">
                                <div class="dbds-review-avatar">
                                    {{ strtoupper(substr($review->name, 0, 1)) }}
                                </div>

                                <div>
                                    <h5>{{ $review->name }}</h5>

                                    <div class="dbds-review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= (int) $review->rating)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <p class="dbds-review-message">
                                “{{ $review->message }}”
                            </p>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="dbds-review-empty">
                    <i class="bi bi-chat-heart"></i>
                    <p>Belum ada ulasan. Jadilah yang pertama berbagi pengalaman.</p>
                </div>
            @endif

            <div class="dbds-review-form-wrap">
                <div class="dbds-review-form-intro">
                    <span class="dbds-review-form-icon">
                        <i class="bi bi-pencil-square"></i>
                    </span>

                    <div>
                        <p class="dbds-eyebrow mb-1">Pengalamanmu</p>
                        <h3>Bagikan Ceritamu</h3>
                        <p>Suka dengan Demala? Ceritakan pengalamanmu.</p>
                    </div>
                </div>

                <form
                    action="{{ route('review.store') }}"
                    method="POST"
                    class="dbds-review-form"
                >
                    @csrf

                    <div class="dbds-review-form-row">
                        <div class="dbds-review-field">
                            <label for="review-name">Nama</label>
                            <input
                                type="text"
                                id="review-name"
                                name="name"
                                class="dbds-review-input"
                                placeholder="Nama kamu"
                                value="{{ old('name') }}"
                                required
                            >
                        </div>

                        <div class="dbds-review-field">
                            <label>Rating</label>

                            <div class="dbds-star-input">
                                @for($i = 5; $i >= 1; $i--)
                                    <input
                                        type="radio"
                                        id="review-star-{{ $i }}"
                                        name="rating"
                                        value="{{ $i }}"
                                        {{ old('rating', 5) == $i ? 'checked' : '' }}
                                    >
                                    <label
                                        for="review-star-{{ $i }}"
                                        title="{{ $i }} bintang"
                                    >
                                        <i class="bi bi-star-fill"></i>
                                    </label>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="dbds-review-field">
                        <label for="review-message">Ulasan</label>

                        <textarea
                            id="review-message"
                            name="message"
                            class="dbds-review-input dbds-review-textarea"
                            rows="3"
                            placeholder="Bagaimana pengalamanmu di Demala?"
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    <div class="dbds-review-submit">
                        <small>
                            <i class="bi bi-shield-check"></i>
                            Ulasan akan ditinjau sebelum ditampilkan.
                        </small>

                        <button type="submit" class="dbds-btn-brass">
                            Kirim Ulasan
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection