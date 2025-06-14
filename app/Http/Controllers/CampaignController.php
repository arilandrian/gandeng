<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Menampilkan daftar kampanye (halaman Jelajahi Program).
     */
    public function index()
    {
        return view('campaigns.index');
    }

    /**
     * Menampilkan detail sebuah kampanye.
     * Nantinya akan menerima parameter ID kampanye.
     */
    public function showDetail() // Untuk rute campaigns.show yang statis
    {
        return view('campaigns.show');
    }

    // Metode 'show' yang sebenarnya (nantinya akan menerima ID)
    // public function show($id) { ... }
}