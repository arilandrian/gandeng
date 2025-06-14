<?php

namespace App\Http\Controllers;

use App\Models\Campaign; // <-- Pastikan Anda meng-import model Campaign
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan landing page dengan data program unggulan.
     */
    public function index()
    {
        // 1. Ambil 3 campaign terbaru yang statusnya 'active' dari database
        $featuredCampaigns = Campaign::with('komunitas')
            ->where('status', 'active')
            ->latest()
            ->take(3)
            ->get();

        // 2. Kirim data campaign tersebut ke view 'landing'
        return view('landing', compact('featuredCampaigns'));
    }
}