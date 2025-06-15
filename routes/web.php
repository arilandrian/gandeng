<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
// Import Controller yang akan digunakan (Anda perlu membuat file-file ini)
use App\Http\Controllers\LandingPageController; // Contoh untuk landing page
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonaturController; // Untuk dashboard, history, reviews donatur
use App\Http\Controllers\KomunitasController; // Untuk dashboard, my-programs, budget-report, donor-reviews komunitas
use App\Http\Controllers\AdminController; // Untuk dashboard admin

// Rute Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing'); // DIUBAH

// --- Rute untuk Otentikasi (Login dan Logout) ---

// Menampilkan formulir login
Route::get('/login', [LoginController::class, 'showLoginForm']) // TETAP
    ->middleware('guest')
    ->name('login');

// Memproses data login yang dikirimkan
Route::post('/login', [LoginController::class, 'login']) // TETAP
    ->middleware('guest');

// Logout pengguna
Route::post('/logout', [LoginController::class, 'logout']) // TETAP
    ->middleware('auth')
    ->name('logout');

// --- Rute untuk Registrasi ---

Route::get('/register', [RegisterController::class, 'showChoiceForm'])->name('register.choice');

// Halaman Registrasi Donatur (GET - untuk menampilkan form)
Route::get('/register/donatur', [RegisterController::class, 'showDonaturForm'])
    ->middleware('guest')->name('register.donatur.form');

// Memproses pendaftaran donatur (POST - untuk submit form)
Route::post('/register/donatur', [RegisterController::class, 'registerDonatur'])
    ->middleware('guest')
    ->name('register.donatur');

// Halaman Registrasi Organisasi (GET - untuk menampilkan form)
Route::get('/register/organisasi', [RegisterController::class, 'showKomunitasForm'])
    ->middleware('guest')->name('register.komunitas.form');

// --- TAMBAHKAN RUTE DI BAWAH INI ---
// Memproses pendaftaran organisasi (POST - untuk submit form)
Route::post('/register/organisasi', [RegisterController::class, 'registerOrganisasi'])
    ->middleware('guest')
    ->name('register.komunitas');

// --- Rute untuk Halaman Publik (tanpa login diperlukan) ---

// Rute untuk menampilkan Daftar Kampanye (Program Sosial)
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index'); // DIUBAH

// Rute untuk menampilkan Detail Kampanye
// NANTINYA AKAN MENJADI Route::get('/campaigns/{id}', [CampaignController::class, 'show'])
Route::get('/campaigns/{campaign:slug}', [CampaignController::class, 'show'])->name('campaigns.show');

// Rute untuk menampilkan Form Donasi
// NANTINYA AKAN MENJADI Route::get('/campaigns/{id}/donate', [DonationController::class, 'create'])
Route::get('/campaigns/{campaign:slug}/donate', [DonationController::class, 'create'])->name('donations.create');

// TAMBAHKAN RUTE INI untuk menangani pengiriman form
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');

// --- Rute untuk Dashboard Donatur (membutuhkan login sebagai donatur) ---

// Grup untuk Donatur
Route::middleware(['auth', 'role:donatur'])->prefix('dashboard/donatur')->group(function () {
    Route::get('/', [DonaturController::class, 'dashboard'])->name('donatur.dashboard');

    // -- TAMBAHKAN DUA RUTE INI --
    Route::get('/history', [DonaturController::class, 'history'])->name('donatur.history');
    Route::get('/reviews', [DonaturController::class, 'reviews'])->name('donatur.reviews');
    // ----------------------------
});


// --- Rute untuk Dashboard Komunitas (membutuhkan login sebagai komunitas) ---

// Grup untuk Komunitas
Route::middleware(['auth', 'role:komunitas'])->prefix('dashboard/komunitas')->group(function () {
    Route::get('/', [KomunitasController::class, 'dashboard'])->name('komunitas.dashboard');
    Route::get('/programs', [KomunitasController::class, 'myPrograms'])->name('komunitas.my-programs');
    Route::get('/create-campaign', [CampaignController::class, 'create'])->name('campaigns.create');

    // -- TAMBAHKAN RUTE INI --
    Route::post('/create-campaign', [CampaignController::class, 'store'])->name('campaigns.store');
    // Rute untuk menampilkan halaman Laporan Anggaran
    Route::get('/komunitas/budget-report', [KomunitasController::class, 'budgetReport'])->name('komunitas.budget_report'); // DIUBAH

    // Rute untuk menampilkan halaman Ulasan Donatur
    Route::get('/komunitas/donor-reviews', [KomunitasController::class, 'donorReviews'])->name('komunitas.donor_reviews'); // DIUBAH
});


// --- Rute untuk Dashboard Admin (membutuhkan login sebagai admin) ---

// Rute Dashboard Admin
Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin']) // Penting: auth dan role:admin
    ->name('admin.dashboard');

// --- Rute POST yang akan diaktifkan di kemudian hari (contoh) ---
/*
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store')->middleware('auth');
Route::post('/komunitas/campaigns', [KomunitasController::class, 'storeCampaign'])->name('komunitas.campaigns.store')->middleware(['auth', 'role:komunitas']);
*/