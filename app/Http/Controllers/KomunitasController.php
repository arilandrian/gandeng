<?php

namespace App\Http\Controllers;

use App\Models\Campaign; // Pastikan ini diimpor
use App\Models\Donation; // Pastikan ini diimpor
use App\Models\Review;   // Pastikan ini diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomunitasController extends Controller
{
     /**
     * Menampilkan dashboard Komunitas dengan data dinamis.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Pastikan user adalah komunitas dan memiliki relasi 'komunitas'
        if (!$user->komunitas) {
            abort(403, 'Anda tidak memiliki akses sebagai Komunitas.');
        }

        $komunitas = $user->komunitas;

        // 1. Ambil Data Summary
        // Total Program Aktif
        $totalActivePrograms = $komunitas->campaigns()->where('status', 'active')->count(); // Asumsi ada kolom 'status' di tabel campaigns

        // Total Donasi Diterima (Uang)
        // Ambil semua ID kampanye milik komunitas ini
        $campaignIds = $komunitas->campaigns->pluck('id');
        $totalDonationAmount = Donation::whereIn('campaign_id', $campaignIds)
                                      ->where('donation_type', 'money')
                                      ->where('status', 'completed') // Asumsi hanya donasi 'completed' yang dihitung
                                      ->sum('amount');

        // Rating Rata-rata
        // Gabungkan semua review dari semua kampanye milik komunitas ini
        $averageRating = Review::whereIn('campaign_id', $campaignIds)
                               ->avg('rating'); // Asumsi ada kolom 'rating' di tabel reviews
        // Format rating agar hanya 1 desimal jika ada
        $averageRating = $averageRating ? number_format($averageRating, 1) : 'N/A';

        // 2. Ambil Data Program/Kampanye Saya
        $myPrograms = $komunitas->campaigns()
                                ->with(['donations', 'reviews']) // Eager load donations dan reviews untuk statistik di kartu
                                ->latest() // Urutkan dari yang terbaru
                                ->get(); // Ambil semua, atau bisa juga paginate jika terlalu banyak

        return view('komunitas.dashboard', compact(
            'komunitas',
            'totalActivePrograms',
            'totalDonationAmount',
            'averageRating',
            'myPrograms'
        ));
    }

    /**
     * Menampilkan formulir untuk membuat kampanye baru.
     */
    public function createCampaignForm()
    {
        return view('komunitas.create-campaign');
    }

    /**
     * Menampilkan daftar program yang dibuat oleh komunitas.
     */
    public function myPrograms()
    {
        return view('komunitas.my-programs');
    }

    /**
     * Menampilkan laporan anggaran komunitas.
     */
    public function budgetReport()
    {
        return view('komunitas.budget-report');
    }

    /**
     * Menampilkan ulasan yang diterima komunitas dari donatur.
     */
    public function donorReviews()
    {
        return view('komunitas.donor-reviews');
    }

    /**
     * Menampilkan daftar donasi yang masuk untuk kampanye-kampanye komunitas yang sedang login.
     *
     * @return \Illuminate\View\View
     */

    public function indexDonations()
    {
        $user = Auth::user();
        
        // Pastikan user adalah komunitas dan memiliki relasi 'komunitas'
        if (!$user->komunitas) {
            abort(403, 'Anda tidak memiliki akses sebagai Komunitas.');
        }

        $komunitas = $user->komunitas;

        // Ambil semua ID kampanye yang dimiliki oleh komunitas ini
        $campaignIds = $komunitas->campaigns->pluck('id');

        // Ambil semua donasi yang terkait dengan kampanye-kampanye ini
        // Eager load relasi 'campaign' dan 'user' (donatur) untuk menampilkan informasi
        $donations = Donation::whereIn('campaign_id', $campaignIds)
                             ->with(['campaign', 'user']) // Load campaign dan user (donatur)
                             ->latest() // Urutkan dari donasi terbaru
                             ->paginate(10); // Gunakan paginasi untuk performa lebih baik

        return view('komunitas.donations.index', compact('donations'));
    }
}
