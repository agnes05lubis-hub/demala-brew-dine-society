@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Kontak')

@section('content')

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}
    <section class="dbds-page-header dbds-contact-header">
        <div class="container text-center">
            <p class="dbds-eyebrow">Mari Bertemu</p>

            <h1 class="dbds-page-title">
                Kami Tunggu Kedatanganmu
            </h1>

            <p class="dbds-page-lead mx-auto">
                Punya pertanyaan, ingin reservasi meja, atau sekadar ingin
                menyapa? Hubungi Demala Brew & Dine Society.
            </p>
        </div>
    </section>


    {{-- =========================================================
         CONTACT INTRO
    ========================================================== --}}
    <section class="dbds-contact-main">
        <div class="container">

            <div class="dbds-contact-intro text-center">
                <p class="dbds-eyebrow">Demala Society</p>

                <h2>
                    Mari Berbincang &amp; Bertemu
                </h2>

                <p>
                    Kami siap membantu kebutuhan reservasi, pertanyaan mengenai
                    menu, maupun informasi lainnya seputar Demala Brew &amp;
                    Dine Society.
                </p>
            </div>

{{-- =================================================
     CONTACT INFO CARDS
================================================== --}}
<div class="dbds-contact-cards mb-5">

    {{-- ALAMAT --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-geo-alt"></i>
            </div>

            <span>Lokasi</span>

            <h4>Alamat Kami</h4>

            <p>
                Jl. Sisingamangaraja No.102,
                Rintis, Pekanbaru Kota,
                Kota Pekanbaru, Riau 28156
            </p>

            <a
                href="https://www.google.com/maps/search/?api=1&query=DEMALA+Brew+%26+Dine+Society%2C+Pekanbaru"
                target="_blank"
                rel="noopener"
                class="dbds-contact-link"
            >
                Lihat di Maps
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </div>


    {{-- WHATSAPP --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-whatsapp"></i>
            </div>

            <span>Hubungi Kami</span>

            <h4>WhatsApp</h4>

            <p>
                +62 851-1056-6398
                <br>
                Respon untuk pertanyaan &amp; reservasi.
            </p>

            <a
                href="https://wa.me/6285110566398?text=Halo%20Demala%20Brew%20%26%20Dine%20Society%2C%20saya%20ingin%20bertanya."
                target="_blank"
                rel="noopener"
                class="dbds-contact-link"
            >
                Chat Sekarang
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </div>


    {{-- INSTAGRAM --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-instagram"></i>
            </div>

            <span>Social Media</span>

            <h4>Instagram</h4>

            <p>
                @demalabrewanddine
                <br>
                Ikuti cerita dan suasana terbaru Demala.
            </p>

            <a
                href="https://www.instagram.com/demala.society?stkn=MW91c2k5NHJxMmR0cw=="
                target="_blank"
                rel="noopener"
                class="dbds-contact-link"
            >
                Follow Instagram
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </div>


    {{-- TIKTOK --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-tiktok"></i>
            </div>

            <span>Social Media</span>

            <h4>tiktok</h4>

            <p>
                <demala class="society"></demala>
                <br>
                Follow keseruan kami.
            </p>

            <a
                href="https://www.tiktok.com/@demala.society?is_from_webapp=1&sender_device=pc"
                target="_blank"
                rel="noopener"
                class="dbds-contact-link"
            >
                Follow Instagram
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </div>


    {{-- GMAIL --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-envelope"></i>
            </div>

            <span>Email</span>

            <h4>Gmail</h4>

            <p>
                demalasisingamangarajapku@gmail.com
                <br>
                Hubungi kami melalui email.
            </p>

            <a
                href="mailto:demalasisingamangarajapku@gmail.com"
                class="dbds-contact-link"
            >
                Kirim Email
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>

    </div>


    {{-- JAM BUKA --}}
    <div class="dbds-contact-card-item">

        <div class="dbds-contact-info-card">

            <div class="dbds-contact-icon">
                <i class="bi bi-clock"></i>
            </div>

            <span>Waktu Operasional</span>

            <h4>Jam Buka</h4>

            <p>
                Setiap Hari
                <br>
                08.00 – 04.00 WIB
            </p>

            <div class="dbds-open-status">
                <span></span>
                Melayani setiap hari
            </div>

        </div>

    </div>

</div>
           

            {{-- =================================================
                 FORM + CONTACT SIDE
            ================================================== --}}
            <div class="row g-5 align-items-stretch">

                {{-- LEFT --}}
                <div class="col-lg-5">

                    <div class="dbds-contact-message">

                        <p class="dbds-eyebrow">
                            Let's Connect
                        </p>

                        <h2>
                            Punya sesuatu untuk
                            <em>dibicarakan?</em>
                        </h2>

                        <p>
                            Jangan ragu untuk menghubungi kami. Untuk reservasi
                            meja yang lebih cepat, kamu juga bisa langsung
                            menghubungi Demala melalui WhatsApp.
                        </p>


                        <div class="dbds-contact-quick">

                            <div class="dbds-quick-item">
                                <div class="dbds-quick-icon">
                                    <i class="bi bi-chat-dots"></i>
                                </div>

                                <div>
                                    <strong>Reservasi &amp; Pertanyaan</strong>
                                    <small>
                                        Hubungi kami melalui WhatsApp
                                    </small>
                                </div>
                            </div>


                            <div class="dbds-quick-item">
                                <div class="dbds-quick-icon">
                                    <i class="bi bi-cup-hot"></i>
                                </div>

                                <div>
                                    <strong>Datang &amp; Nikmati</strong>
                                    <small>
                                        Temukan suasana Demala Society
                                    </small>
                                </div>
                            </div>

                        </div>


                        <a
                            href="https://wa.me/6285110566398?text=Halo%20Demala%20Brew%20%26%20Dine%20Society%2C%20saya%20ingin%20reservasi%20meja."
                            target="_blank"
                            rel="noopener"
                            class="btn dbds-btn-brass dbds-contact-wa"
                        >
                            <i class="bi bi-whatsapp"></i>
                            Reservasi via WhatsApp
                        </a>

                    </div>

                </div>


                {{-- RIGHT FORM --}}
                <div class="col-lg-7">

                    <div class="dbds-form-card">

                        <div class="dbds-form-heading">
                            <div>
                                <p class="dbds-eyebrow">
                                    Get in Touch
                                </p>

                                <h3>
                                    Kirim Pesan
                                </h3>
                            </div>

                            <div class="dbds-form-mark">
                                D
                            </div>
                        </div>


                        <p class="dbds-form-description">
                            Isi formulir berikut dan sampaikan pertanyaan atau
                            kebutuhan reservasi kamu kepada kami.
                        </p>


                        <form action="{{ url('/kontak') }}" method="POST">

                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control dbds-input"
                                        placeholder="Nama Anda"
                                        required
                                    >
                                </div>
                                <div class="col-12">
                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control dbds-input"
                                        placeholder="nama@email.com"
                                        required
                                    >
                                </div>


                                <div class="col-12">
                                    <label class="form-label">
                                        Pesan
                                    </label>

                                    <textarea
                                        name="pesan"
                                        rows="5"
                                        class="form-control dbds-input"
                                        placeholder="Tuliskan pesan atau permintaan reservasi Anda"
                                    ></textarea>
                                </div>


                                <div class="col-12">
                                    <button
                                        type="submit"
                                        class="btn dbds-btn-brass dbds-submit-btn"
                                    >
                                        Kirim Pesan
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>

        {{-- =========================================================
         FORM RESERVASI MEJA
    ========================================================== --}}
    <section class="dbds-contact-main" id="reservasi">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="dbds-form-card">

                        <div class="dbds-form-heading">
                            <div>
                                <p class="dbds-eyebrow">Reservasi</p>
                                <h3>Pesan Meja</h3>
                            </div>
                            <div class="dbds-form-mark">D</div>
                        </div>

                        <p class="dbds-form-description">
                            Isi data berikut dan tim Demala akan mengonfirmasi reservasi kamu.
                        </p>

                        @if(session('reservation_success'))
                            <div class="alert alert-success">{{ session('reservation_success') }}</div>
                        @endif

                        <form action="{{ route('reservation.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                           class="form-control dbds-input" placeholder="Nama Anda" required>
                                    @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">No. WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}"
                                           class="form-control dbds-input" placeholder="08xxxxxxxxxx" required>
                                    @error('phone')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="reservation_date" value="{{ old('reservation_date') }}"
                                           min="{{ date('Y-m-d') }}" class="form-control dbds-input" required>
                                    @error('reservation_date')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Jam</label>
                                    <input type="time" name="reservation_time" value="{{ old('reservation_time') }}"
                                           class="form-control dbds-input" required>
                                    @error('reservation_time')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Jumlah Orang</label>
                                    <input type="number" name="guests" value="{{ old('guests', 2) }}" min="1" max="50"
                                           class="form-control dbds-input" required>
                                    @error('guests')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Catatan (opsional)</label>
                                    <textarea name="notes" rows="3" class="form-control dbds-input"
                                              placeholder="Contoh: dekat colokan, ada anak kecil, acara ulang tahun">{{ old('notes') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn dbds-btn-brass dbds-submit-btn">
                                        Kirim Reservasi
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
         MAP
    ========================================================== --}}
    <section class="dbds-location-section">

        <div class="container">

            <div class="dbds-location-heading">

                <div>
                    <p class="dbds-eyebrow">
                        Find Us
                    </p>

                    <h2>
                        Temukan Demala Society
                    </h2>

                    <p>
                        Kami berada di Jl. Sisingamangaraja No.102,
                        Rintis, Pekanbaru Kota.
                    </p>
                </div>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=GFH4%2B97H%2C%20Jl.%20Sisingamangaraja%20No.102%2C%20Rintis%2C%20Pekanbaru%20Kota%2C%20Kota%20Pekanbaru%2C%20Riau%2028156"
                    target="_blank"
                    rel="noopener"
                    class="btn dbds-btn-outline"
                >
                    <i class="bi bi-geo-alt"></i>
                    Buka Google Maps
                </a>

            </div>


            <div class="dbds-map-wrapper">

                <iframe
                    src="https://www.google.com/maps?q=GFH4%2B97H%2C%20Jl.%20Sisingamangaraja%20No.102%2C%20Rintis%2C%20Pekanbaru%20Kota%2C%20Kota%20Pekanbaru%2C%20Riau%2028156&output=embed"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="dbds-map-label">

                    <div class="dbds-map-label-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div>
                        <strong>Demala Brew &amp; Dine Society</strong>
                        <span>
                            Jl. Sisingamangaraja No.102, Pekanbaru
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection