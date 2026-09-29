<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\CategoryPhotoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminOrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;


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
Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('/admin-demala', [LoginController::class, 'showLoginForm'])->name('admin.login');


Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/daftar', [RegisterController::class, 'create'])->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.store');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : view('dashboard');
    })->name('dashboard');

    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::delete('/profil/foto', [ProfileController::class, 'removePhoto'])->name('profile.photo.remove');


    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            Route::resource('menu', AdminMenuController::class);

            Route::get('categories', [CategoryPhotoController::class, 'index'])
                ->name('categories.index');

            Route::post('categories/{groupName}', [CategoryPhotoController::class, 'update'])
                ->name('categories.update');

            Route::get('ulasan', [AdminReviewController::class, 'index'])->name('reviews.index');
            Route::patch('ulasan/{review}/terima', [AdminReviewController::class, 'approve'])->name('reviews.approve');
            Route::patch('ulasan/{review}/tolak', [AdminReviewController::class, 'reject'])->name('reviews.reject');
            Route::delete('ulasan/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

          
            Route::get('user', [AdminUserController::class, 'index'])->name('users.index');
            Route::post('user', [AdminUserController::class, 'store'])->name('users.store');
            Route::put('user/{user}', [AdminUserController::class, 'update'])->name('users.update');
            Route::patch('user/{user}/status', [AdminUserController::class, 'toggle'])->name('users.toggle');
            Route::delete('user/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

          
            Route::get('reservasi', [AdminReservationController::class, 'index'])->name('reservations.index');
            Route::patch('reservasi/{reservation}/konfirmasi', [AdminReservationController::class, 'confirm'])->name('reservations.confirm');
            Route::patch('reservasi/{reservation}/batal', [AdminReservationController::class, 'cancel'])->name('reservations.cancel');
            Route::delete('reservasi/{reservation}', [AdminReservationController::class, 'destroy'])->name('reservations.destroy');

            // Pesanan
            Route::get('pesanan', [AdminOrderController::class, 'index'])
                ->name('orders.index');

            Route::get('pesanan/{order}', [AdminOrderController::class, 'show'])
                ->name('orders.show');

            Route::patch('pesanan/{order}/status', [AdminOrderController::class, 'updateStatus'])
                ->name('orders.status');

            Route::delete('pesanan/{order}', [AdminOrderController::class, 'destroy'])
                ->name('orders.destroy');
        });
});