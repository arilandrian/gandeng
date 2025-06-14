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

// Halaman Registrasi Donatur (GET - untuk menampilkan form)
Route::get('/register/donatur', [RegisterController::class, 'showRegisterDonaturForm']) // DIUBAH (Anda perlu membuat method ini)
    ->middleware('guest')->name('register.donatur.form');

// Memproses pendaftaran donatur (POST - untuk submit form)
Route::post('/register/donatur', [RegisterController::class, 'registerDonatur']) // TETAP
    ->middleware('guest')
    ->name('register.donatur');

// Halaman Registrasi Organisasi (GET - untuk menampilkan form)
Route::get('/register/organisasi', [RegisterController::class, 'showRegisterOrganisasiForm']) // DIUBAH (Anda perlu membuat method ini)
    ->middleware('guest')->name('register.organisasi.form');

// --- Rute untuk Halaman Publik (tanpa login diperlukan) ---

// Rute untuk menampilkan Daftar Kampanye (Program Sosial)
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index'); // DIUBAH

// Rute untuk menampilkan Detail Kampanye
// NANTINYA AKAN MENJADI Route::get('/campaigns/{id}', [CampaignController::class, 'show'])
Route::get('/campaigns/detail', [CampaignController::class, 'showDetail'])->name('campaigns.show'); // DIUBAH (showDetail karena show akan untuk dinamis)

// Rute untuk menampilkan Form Donasi
// NANTINYA AKAN MENJADI Route::get('/campaigns/{id}/donate', [DonationController::class, 'create'])
Route::get('/donations/create', [DonationController::class, 'createForm'])->name('donations.create'); // DIUBAH (createForm karena create akan untuk dinamis)


// --- Rute untuk Dashboard Donatur (membutuhkan login sebagai donatur) ---

// Rute Dashboard Donatur
Route::get('/dashboard/donatur', [DonaturController::class, 'dashboard'])
  ->middleware(['auth', 'role:donatur']) // Penting: auth dan role:donatur
  ->name('donatur.dashboard');

// Rute untuk menampilkan Riwayat Donasi Donatur
Route::get('/donatur/history', [DonaturController::class, 'history'])->name('donatur.donation_history'); // DIUBAH

// Rute untuk menampilkan Riwayat Ulasan Donatur
Route::get('/donatur/reviews', [DonaturController::class, 'reviews'])->name('donatur.reviews_history'); // DIUBAH


// --- Rute untuk Dashboard Komunitas (membutuhkan login sebagai komunitas) ---

// Rute Dashboard Komunitas
Route::get('/dashboard/komunitas', [KomunitasController::class, 'dashboard'])
  ->middleware(['auth', 'role:komunitas']) // Penting: auth dan role:komunitas
  ->name('komunitas.dashboard');

// Rute untuk menampilkan formulir Buat Kampanye
Route::get('/komunitas/campaigns/create', [KomunitasController::class, 'createCampaignForm'])->name('komunitas.create_campaign'); // DIUBAH

// Rute untuk menampilkan halaman Program Saya
Route::get('/komunitas/my-programs', [KomunitasController::class, 'myPrograms'])->name('komunitas.my_programs'); // DIUBAH

// Rute untuk menampilkan halaman Laporan Anggaran
Route::get('/komunitas/budget-report', [KomunitasController::class, 'budgetReport'])->name('komunitas.budget_report'); // DIUBAH

// Rute untuk menampilkan halaman Ulasan Donatur
Route::get('/komunitas/donor-reviews', [KomunitasController::class, 'donorReviews'])->name('komunitas.donor_reviews'); // DIUBAH

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