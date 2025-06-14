<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    /**
     * Menampilkan dashboard komunitas.
     */
    public function dashboard()
    {
        return view('komunitas.dashboard');
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

    // Metode untuk menyimpan kampanye akan ditambahkan nanti, misal storeCampaign(Request $request)
    // public function storeCampaign(Request $request) { ... }
}