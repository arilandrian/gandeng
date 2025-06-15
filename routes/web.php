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

// --- Rute untuk Otentikasi (Login dan Logout) ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// --- Rute untuk Registrasi ---

Route::get('/register', [RegisterController::class, 'showChoiceForm'])->name('register.choice');

// --- Rute untuk Registrasi ---
Route::get('/register', [RegisterController::class, 'showChoiceForm'])->name('register.choice');
Route::get('/register/donatur', [RegisterController::class, 'showDonaturForm'])->middleware('guest')->name('register.donatur.form');
Route::post('/register/donatur', [RegisterController::class, 'registerDonatur'])->middleware('guest')->name('register.donatur');
Route::get('/register/organisasi', [RegisterController::class, 'showKomunitasForm'])->middleware('guest')->name('register.komunitas.form');
Route::post('/register/organisasi', [RegisterController::class, 'registerOrganisasi'])->middleware('guest')->name('register.komunitas');

// --- Rute untuk Halaman Publik (tanpa login diperlukan) ---
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{campaign:slug}', [CampaignController::class, 'show'])->name('campaigns.show');
Route::get('/campaigns/{campaign:slug}/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');

// --- Rute untuk Dashboard Donatur (membutuhkan login sebagai donatur) ---

// --- Rute untuk Dashboard Donatur (membutuhkan login sebagai donatur) ---
Route::middleware(['auth', 'role:donatur'])->prefix('dashboard/donatur')->group(function () {
    Route::get('/', [DonaturController::class, 'dashboard'])->name('donatur.dashboard');
    Route::get('/history', [DonaturController::class, 'history'])->name('donatur.history');
    Route::get('/reviews', [DonaturController::class, 'reviews'])->name('donatur.reviews');
});

// --- Rute untuk Dashboard Komunitas (membutuhkan login sebagai komunitas) ---
Route::middleware(['auth', 'role:komunitas'])->prefix('dashboard/komunitas')->group(function () {
    Route::get('/', [KomunitasController::class, 'dashboard'])->name('komunitas.dashboard');
    Route::get('/programs', [KomunitasController::class, 'myPrograms'])->name('komunitas.my-programs');
    
    // PERBAIKAN: Mengarah ke KomunitasController untuk manajemen kampanye komunitas
    Route::get('/create-campaign', [KomunitasController::class, 'createCampaign'])->name('komunitas.create-campaign');
    Route::post('/create-campaign', [KomunitasController::class, 'storeCampaign'])->name('komunitas.store-campaign');
    
    // Rute untuk mengedit dan update kampanye (sesuai KomunitasController Anda)
    Route::get('/campaigns/{campaign:slug}/edit', [KomunitasController::class, 'editCampaign'])->name('komunitas.edit-campaign');
    Route::put('/campaigns/{campaign:slug}', [KomunitasController::class, 'updateCampaign'])->name('komunitas.update-campaign');
    Route::delete('/campaigns/{campaign:slug}', [KomunitasController::class, 'destroyCampaign'])->name('komunitas.destroy-campaign');


    // PERBAIKAN: Menambahkan rute untuk daftar donasi masuk
    Route::get('/donations', [KomunitasController::class, 'indexDonations'])->name('komunitas.donations.index');

    // PERBAIKAN: Menggunakan nama rute yang konsisten dan sesuai dengan metode di KomunitasController
    Route::get('/budget-report', [KomunitasController::class, 'budgetReports'])->name('komunitas.budget-report');
    Route::get('/donor-reviews', [KomunitasController::class, 'donorReviews'])->name('komunitas.donor-reviews');
});

// --- Rute untuk Dashboard Admin (membutuhkan login sebagai admin) ---
Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

