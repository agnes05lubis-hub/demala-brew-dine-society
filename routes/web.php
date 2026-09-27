<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\CategoryPhotoController;
use App\Http\Controllers\ReviewController;

// ===== HALAMAN PUBLIC (Tidak perlu login) =====

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

Route::post('/ulasan', [ReviewController::class, 'store'])->name('review.store');

// ===== MENU PUBLIC =====
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');

// ===== LOGIN ROUTES =====

// Login untuk user/pelanggan biasa — ini yang dipakai tombol "Login" di navbar
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route rahasia khusus admin. Tampilannya SAMA PERSIS dengan /login
// (pakai controller & view yang sama), cuma URL-nya beda dan tidak ada
// link ke sini di halaman manapun — hanya bisa diakses kalau diketik manual.
Route::get('/admin-demala', [LoginController::class, 'showLoginForm'])->name('admin.login');

// Kedua route di atas submit ke sini. Redirect tujuan ditentukan otomatis
// berdasarkan role user (lihat LoginController@login), bukan berdasarkan
// dari URL mana dia login.
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===== PROTECTED ROUTES =====
Route::middleware('auth')->group(function () {

    // Dashboard untuk user biasa
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // ===== ADMIN ROUTES =====
    // HANYA ADMIN yang boleh masuk ke sini (middleware 'admin' = IsAdmin)
    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Dashboard khusus admin -> /admin/dashboard
            Route::get('dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            // Tambah, lihat, edit, hapus MENU
            Route::resource('menu', AdminMenuController::class);

            // Kelola KATEGORI
            Route::get('categories', [CategoryPhotoController::class, 'index'])
                ->name('categories.index');

            Route::post('categories/{groupName}', [CategoryPhotoController::class, 'update'])
                ->name('categories.update');
        });
});