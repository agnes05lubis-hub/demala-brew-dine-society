@extends('layouts.app')

@section('title', 'Demala Brew & Dine Society — Menu')

@php
    /**
     * =========================================================
     * DATA MENU — diambil dari database (tabel menus).
     * Kelola menu lewat dashboard admin, halaman ini otomatis
     * mengikuti. Menu yang statusnya "Habis" tidak ditampilkan.
     * =========================================================
     */
    $dbMenus = \App\Models\Menu::where('is_available', true)
        ->orderBy('sort_order', 'asc')
        ->get();

    $categoryMeta = [
        'Food'  => ['key' => 'food',  'title' => 'Food',  'icon' => 'bi-egg-fried'],
        'Drink' => ['key' => 'drink', 'title' => 'Drink', 'icon' => 'bi-cup-hot'],
    ];

    $menuCategories = [];

    foreach ($categoryMeta as $categoryName => $meta) {

        $menuCategories[$meta['key']] = [
            'title'  => $meta['title'],
            'icon'   => $meta['icon'],
            'groups' => [],
        ];

        $grouped = $dbMenus->where('category', $categoryName)->groupBy('group_name');

        foreach ($grouped as $groupName => $items) {

            $first = $items->first();

            $menuCategories[$meta['key']]['groups'][$groupName] = [
                'image' => $first->group_image ?: 'demala-foto.jpg',
                'note'  => $first->group_note,
                'items' => $items->map(function ($item) {
                    return [
                        'name'       => $item->name,
                        'desc'       => $item->description,
                        'price_text' => 'Rp ' . number_format($item->price, 0, ',', '.'),
                    ];
                })->all(),
            ];
        }
    }
@endphp
@section('content')

{{-- =========================================================
     HEADER MENU
========================================================= --}}
<section class="dbds-page-header dbds-menu-header">
    <div class="container text-center">

        <p class="dbds-eyebrow">
            Buku Menu Kami
        </p>

        <h1 class="dbds-page-title">
            Racikan yang Kami Banggakan
        </h1>

        <p class="dbds-page-lead mx-auto">
            Jelajahi pilihan Food & Drink dari Demala Brew & Dine Society.
        </p>

    </div>
</section>


{{-- =========================================================
     MENU
========================================================= --}}
<section class="dbds-section dbds-menu-page">

    <div class="container">

        {{-- FOOD / DRINK TAB --}}
        <div class="dbds-menu-tabs">

            @foreach($menuCategories as $key => $category)

               <button type="button"
                class="dbds-menu-main-tab {{ $loop->first ? 'active' : '' }}"
                data-category="{{ $key }}"
                onclick="showMenuCategory('{{ $key }}', this)">
                <i class="bi {{ $category['icon'] }}"></i>
                <span>{{ $category['title'] }}</span>
            </button>

            @endforeach

        </div>


        {{-- FOOD / DRINK CONTENT --}}
        @foreach($menuCategories as $key => $category)

            <div
                id="menu-category-{{ $key }}"
                class="dbds-menu-category {{ $loop->first ? 'active' : '' }}"
            >

                {{-- LAYOUT --}}
                <div class="dbds-menu-layout">


                    {{-- SIDEBAR KATEGORI --}}
                    <aside class="dbds-menu-sidebar">

                        <p class="dbds-sidebar-title">
                            Kategori
                        </p>

                        <div class="dbds-sidebar-list">

                            @foreach($category['groups'] as $groupName => $group)

                                <a
                                    href="#group-{{ $key }}-{{ $loop->index }}"
                                    class="dbds-sidebar-link {{ $loop->first ? 'active' : '' }}"
                                    onclick="jumpToGroup(event, this)"
                                >
                                    <span>
                                        {{ $groupName }}
                                    </span>

                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            @endforeach

                        </div>

                    </aside>


                    {{-- GRID GROUP MENU --}}
                    <div class="dbds-menu-grid">

                        @foreach($category['groups'] as $groupName => $group)

                            <article
                                class="dbds-menu-group-card"
                                id="group-{{ $key }}-{{ $loop->index }}"
                            >

                                {{-- FOTO GROUP --}}
                                <div class="dbds-menu-group-cover">

                                    {{-- Backdrop blur dari foto yang sama, biar area kosong
                                         (akibat foto tidak di-crop) tetap terlihat penuh & estetik --}}
                                    <img
                                        class="dbds-cover-bg"
                                        src="{{ asset('storage/images/' . $group['image']) }}"
                                        alt=""
                                        aria-hidden="true"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/images/demala-foto.jpg') }}';"
                                    >

                                    {{-- Foto utuh, tidak di-crop --}}
                                    <img
                                        class="dbds-cover-main"
                                        src="{{ asset('storage/images/' . $group['image']) }}"
                                        alt="{{ $groupName }}"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.src='{{ asset('storage/images/demala-foto.jpg') }}';"
                                    >

                                    <div class="dbds-menu-group-overlay">

                                        <div class="dbds-menu-group-icon">
                                            <i class="bi bi-cup-hot"></i>
                                        </div>

                                        <h3>
                                            {{ $groupName }}
                                        </h3>

                                        <button
                                            type="button"
                                            class="dbds-see-menu"
                                            onclick="toggleMenuGroup(this)"
                                        >
                                            LIHAT MENU
                                            <span>↓</span>
                                        </button>

                                    </div>

                                </div>


                                {{-- ISI MENU --}}
                                <div class="dbds-menu-group-body">

                                    {{-- HEADER GROUP --}}
                                    <div class="dbds-menu-group-title">

                                        <div>

                                            <span>
                                                DEMALA SOCIETY
                                            </span>

                                            <h4>
                                                {{ $groupName }}
                                            </h4>

                                        </div>

                                        <button
                                            type="button"
                                            class="dbds-close-group"
                                            onclick="toggleMenuGroup(
                                                this.closest('.dbds-menu-group-card')
                                                    .querySelector('.dbds-menu-group-cover button')
                                            )"
                                        >
                                            Tutup ×
                                        </button>

                                    </div>


                                    {{-- DAFTAR MENU --}}
                                    <div class="dbds-menu-items">

                                        @foreach($group['items'] as $item)

                                            @php

                                                // HARGA
                                                if (!empty($item['price_text'])) {

                                                    $itemPrice = $item['price_text'];

                                                } else {

                                                    $itemPrice = 'Rp ' . number_format(
                                                        ($item['price'] ?? 0) * 1000,
                                                        0,
                                                        ',',
                                                        '.'
                                                    );

                                                }


                                                // PESAN WHATSAPP
                                                $whatsappMessage =
                                                    "Halo Demala Brew & Dine Society,\n\n" .
                                                    "Saya ingin memesan:\n" .
                                                    "Menu: " . $item['name'] . "\n" .
                                                    "Harga: " . $itemPrice . "\n\n" .
                                                    "Mohon informasi selanjutnya. Terima kasih.";

                                            @endphp


                                            <div class="dbds-menu-item">

                                                {{-- INFO MENU --}}
                                                <div class="dbds-menu-item-info">

                                                    <h5>
                                                        {{ $item['name'] }}
                                                    </h5>

                                                    <div class="dbds-item-price">
                                                        {{ $itemPrice }}
                                                    </div>

                                                    @if(!empty($item['desc']))

                                                        <p>
                                                            {{ $item['desc'] }}
                                                        </p>

                                                    @endif

                                                </div>


                                                {{-- PESAN WHATSAPP --}}
                                                <a
                                                    href="https://wa.me/6285110566398?text={{ urlencode($whatsappMessage) }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="dbds-menu-wa"
                                                >
                                                    <i class="bi bi-whatsapp"></i>

                                                    <span>
                                                        Pesan via WA
                                                    </span>
                                                </a>

                                            </div>

                                        @endforeach

                                    </div>


                                    {{-- NOTE GROUP --}}
                                    @if(!empty($group['note']))

                                        <div class="dbds-menu-note">

                                            <i class="bi bi-info-circle"></i>

                                            <span>
                                                {{ $group['note'] }}
                                            </span>

                                        </div>

                                    @endif

                                </div>

                            </article>

                        @endforeach

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
     * Semua group ditutup saat halaman pertama kali dibuka.
     */

    document.querySelectorAll('.dbds-menu-group-card').forEach(function (card) {

        card.classList.remove('opened');

        const body = card.querySelector('.dbds-menu-group-body');

        const button = card.querySelector('.dbds-see-menu');

        if (body) {
            body.style.maxHeight = '0px';
        }

        if (button) {
            button.innerHTML = 'LIHAT MENU <span>↓</span>';
        }

    });

});


/*
 * FOOD / DRINK
 */

function showMenuCategory(categoryKey, button) {

    // Hilangkan active dari semua tab
    document
        .querySelectorAll('.dbds-menu-main-tab')
        .forEach(function (tab) {

            tab.classList.remove('active');

        });


    // Sembunyikan semua kategori
    document
        .querySelectorAll('.dbds-menu-category')
        .forEach(function (categoryBox) {

            categoryBox.classList.remove('active');

        });


    // Aktifkan tab yang diklik
    button.classList.add('active');


    // Ambil kategori yang dipilih
    const target = document.getElementById(
        'menu-category-' + categoryKey
    );


    if (!target) {
        return;
    }


    // Tampilkan kategori
    target.classList.add('active');


    // Tutup semua group yang sebelumnya terbuka
    target
        .querySelectorAll('.dbds-menu-group-card.opened')
        .forEach(function (card) {

            closeMenuGroup(card);

        });


    // Scroll sedikit ke area menu
    const menuPage = document.querySelector('.dbds-menu-page');

    if (menuPage) {

        window.scrollTo({

            top: menuPage.offsetTop - 30,

            behavior: 'smooth'

        });

    }

}


/*
 * BUKA / TUTUP GROUP
 */

function toggleMenuGroup(button) {

    const card = button.closest(
        '.dbds-menu-group-card'
    );

    if (!card) {
        return;
    }


    const currentCategory = card.closest(
        '.dbds-menu-category'
    );


    // Kalau group sedang terbuka maka tutup.
    if (card.classList.contains('opened')) {

        closeMenuGroup(card);

        return;

    }


    // TUTUP GROUP LAIN
    if (currentCategory) {

        currentCategory
            .querySelectorAll('.dbds-menu-group-card.opened')
            .forEach(function (otherCard) {

                if (otherCard !== card) {

                    closeMenuGroup(otherCard);

                }

            });

    }


    // BUKA GROUP YANG DIKLIK
    const body = card.querySelector(
        '.dbds-menu-group-body'
    );

    const openButton = card.querySelector(
        '.dbds-see-menu'
    );


    if (!body) {
        return;
    }


    card.classList.add('opened');


    if (openButton) {

        openButton.innerHTML =
            'TUTUP <span>↑</span>';

    }


    // Gunakan scrollHeight supaya tinggi mengikuti isi menu.
    body.style.maxHeight =
        body.scrollHeight + 'px';

}


/*
 * FUNGSI TUTUP GROUP
 */

function closeMenuGroup(card) {

    if (!card) {
        return;
    }


    card.classList.remove('opened');


    const body = card.querySelector(
        '.dbds-menu-group-body'
    );

    const button = card.querySelector(
        '.dbds-see-menu'
    );


    if (body) {

        body.style.maxHeight = '0px';

    }


    if (button) {

        button.innerHTML =
            'LIHAT MENU <span>↓</span>';

    }

}


/*
 * SIDEBAR KATEGORI
 */

function jumpToGroup(event, link) {

    event.preventDefault();


    const targetId =
        link.getAttribute('href').substring(1);


    const targetCard =
        document.getElementById(targetId);


    if (!targetCard) {
        return;
    }


    // Aktifkan sidebar link
    const sidebar =
        link.closest('.dbds-menu-sidebar');


    if (sidebar) {

        sidebar
            .querySelectorAll('.dbds-sidebar-link')
            .forEach(function (item) {

                item.classList.remove('active');

            });

    }


    link.classList.add('active');


    // Buka group yang dipilih.
    if (!targetCard.classList.contains('opened')) {

        const button =
            targetCard.querySelector(
                '.dbds-see-menu'
            );

        if (button) {

            toggleMenuGroup(button);

        }

    }


    // Scroll ke group
    setTimeout(function () {

        targetCard.scrollIntoView({

            behavior: 'smooth',

            block: 'center'

        });

    }, 150);

}

</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil parameter ?category= dari URL
    const params = new URLSearchParams(window.location.search);
    const category = params.get('category'); // 'food' atau 'drink'

    if (category) {
        // Cari tombol tab yang sesuai dengan data-category
        const tab = document.querySelector(
            `.dbds-menu-main-tab[data-category="${category}"]`
        );

        if (tab) {
            // Klik tab secara otomatis
            tab.click();

            // Scroll smooth ke section menu setelah 300ms (biar animasi tab selesai)
            setTimeout(() => {
                const menuPage = document.querySelector('.dbds-menu-page');
                if (menuPage) {
                    menuPage.scrollIntoView({ behavior: 'smooth' });
                }
            }, 300);
        }
    }
});
</script>

@endsection