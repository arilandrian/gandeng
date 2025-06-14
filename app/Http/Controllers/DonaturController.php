<?php
// File: app/Http/Controllers/DonaturController.php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonaturController extends Controller
{
    /**
     * Menampilkan dashboard donatur.
     */
    public function dashboard()
    {
        $user = Auth::user();

        $totalDonasi = $user->donations()->sum('amount');
        $jumlahCampaign = $user->donations()->distinct('campaign_id')->count();
        $jumlahUlasan = $user->reviews()->count();

        // --- PERBAIKAN PADA QUERY INI ---
        $programDidukung = Donation::with('campaign')
            ->where('user_id', $user->id)
            ->select(
                'campaign_id',
                DB::raw('SUM(amount) as total_donasi_per_campaign'),
                DB::raw('MAX(created_at) as tanggal_donasi_terakhir') // 1. Ambil tanggal donasi terbaru
            )
            ->groupBy('campaign_id')
            ->orderBy('tanggal_donasi_terakhir', 'desc') // 2. Urutkan berdasarkan tanggal terbaru itu
            ->get();
        // --- AKHIR PERBAIKAN ---

        return view('donatur.dashboard', [
            'totalDonasi' => $totalDonasi,
            'jumlahCampaign' => $jumlahCampaign,
            'jumlahUlasan' => $jumlahUlasan,
            'programDidukung' => $programDidukung,
        ]);
    }
    
    /**
     * Menampilkan riwayat donasi donatur.
     */
    public function history()
    {
        return view('donatur.history');
    }

    /**
     * Menampilkan riwayat ulasan donatur (ulasan yang diberikan oleh donatur).
     */
    public function reviews()
    {
        return view('donatur.reviews');
    }
}