<?php
namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Campaign;
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

        $programDidukung = Donation::with(['campaign', 'campaign.organization'])
            ->where('user_id', $user->id)
            ->select(
                'campaign_id',
                DB::raw('SUM(amount) as total_donasi_per_campaign'),
                DB::raw('MAX(created_at) as tanggal_donasi_terakhir')
            )
            ->groupBy('campaign_id')
            ->orderBy('tanggal_donasi_terakhir', 'desc')
            ->get();

        $rekomendasiProgram = Campaign::with('organization')
            ->whereNotIn('id', $user->donations()->pluck('campaign_id'))
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('donatur.dashboard', [
            'totalDonasi' => $totalDonasi,
            'jumlahCampaign' => $jumlahCampaign,
            'jumlahUlasan' => $jumlahUlasan,
            'programDidukung' => $programDidukung,
            'rekomendasiProgram' => $rekomendasiProgram
        ]);
    }

    /**
     * Menampilkan detail program
     */
    public function showProgram($id)
    {
        $program = Campaign::with('organization')->findOrFail($id);
        return view('donatur.program-detail', compact('program'));
    }

    /**
     * Menampilkan form donasi
     */
    public function createDonation($campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        return view('donations.create', compact('campaign'));
    }

    /**
     * Menampilkan riwayat donasi donatur.
     */
    public function history()
    {
        $donations = Auth::user()->donations()->with('campaign')->latest()->get();
        return view('donatur.history', compact('donations'));
    }

    /**
     * Menampilkan riwayat ulasan donatur
     */
    public function reviews()
    {
        $reviews = Auth::user()->reviews()->with('campaign')->latest()->get();
        return view('donatur.reviews', compact('reviews'));
    }
}