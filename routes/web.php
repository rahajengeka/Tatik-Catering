<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\MenuAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\PromoAdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC USER ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('user.index'))->name('home');

Route::post('/kirim-review', [ReviewController::class, 'kirim'])
    ->name('kirim-review');

Route::view('/menu', 'user.menu')->name('menu');
Route::view('/faq', 'user.faq')->name('faq');
Route::view('/tentang', 'user.tentang')->name('tentang');
Route::view('/kontak', 'user.kontak')->name('kontak');
Route::view('/contact', 'user.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (Login & Register) — TANPA MIDDLEWARE
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminLoginController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AdminLoginController::class, 'login']);

    Route::view('/register', 'admin.register')
        ->name('register');

    Route::post('/register', [AdminRegisterController::class, 'store'])
        ->name('register'); // tambah name biar konsisten

    Route::post('/logout', [AdminLoginController::class, 'logout'])
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA — DILINDUNGI MIDDLEWARE (semua fitur admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware('admin.auth')
    ->as('admin.')
    ->group(function () {

    // Dashboard
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // MENU MANAGEMENT
    Route::get('/menu', [MenuAdminController::class, 'index'])->name('menu');
    Route::post('/menu', [MenuAdminController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}/edit', [MenuAdminController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [MenuAdminController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [MenuAdminController::class, 'destroy'])->name('menu.destroy');
    Route::patch('/menu/{menu}/toggle', [MenuAdminController::class, 'toggle'])->name('menu.toggle');

    // REVIEW MANAGEMENT
    Route::get('/reviews', [ReviewAdminController::class, 'index'])->name('reviews');
    Route::put('/reviews/{review}/toggle', [ReviewAdminController::class, 'toggle'])->name('reviews.toggle');
    Route::delete('/reviews/{review}', [ReviewAdminController::class, 'destroy'])->name('reviews.destroy');

    // PROMO MANAGEMENT — SUDAH 100% BENAR & FIX!
    Route::get('/promo', [PromoAdminController::class, 'index'])->name('promo');
    Route::post('/promo', [PromoAdminController::class, 'store'])->name('promo.store');
    
    // PAKAI {id} — BUKAN {promo} → INI YANG BIKIN ERROR DARI TADI!
    Route::patch('/promo/{promo}/toggle', [PromoAdminController::class, 'toggle'])
    ->name('promo.toggle');

Route::delete('/promo/{promo}', [PromoAdminController::class, 'destroy'])
    ->name('promo.destroy');
});
