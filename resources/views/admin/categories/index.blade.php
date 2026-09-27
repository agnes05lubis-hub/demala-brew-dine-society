@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('admin_page_title', 'Kelola Kategori')

@section('content')

<div class="demala-category-page">

    <div class="demala-category-header">
        <div>
            <div class="demala-category-eyebrow">
                Demala Brew & Dine Society
            </div>

            <h2>
                Kelola Foto Kategori
            </h2>

            <p>
                Atur foto yang digunakan pada kategori menu Demala.
            </p>
        </div>
    </div>


    @if(session('success'))

        <div class="demala-category-success">
            <i class="bi bi-check-circle"></i>

            {{ session('success') }}
        </div>

    @endif


    <div class="row g-4">

        @foreach($categories as $cat)

            <div class="col-md-6 col-lg-4">

                <div class="demala-category-card">

                    <div class="demala-category-image">

                        <img
                            src="{{ asset('storage/images/' . $cat->group_image) }}"
                            alt="{{ $cat->group_name }}"
                        >

                        <div class="demala-category-image-overlay">
                            <i class="bi bi-camera"></i>
                        </div>

                    </div>


                    <div class="demala-category-body">

                        <div class="demala-category-name">
                            {{ $cat->group_name }}
                        </div>

                        <div class="demala-category-label">
                            Foto kategori
                        </div>


                        <form
                            action="{{ route('admin.categories.update', $cat->group_name) }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf

                            <label class="demala-upload-label">
                                <i class="bi bi-image"></i>
                                Pilih foto baru
                            </label>

                            <input
                                type="file"
                                name="photo"
                                class="form-control demala-category-file"
                                required
                            >

                            <button
                                type="submit"
                                class="demala-category-btn"
                            >
                                <i class="bi bi-cloud-arrow-up"></i>
                                Update Foto
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection