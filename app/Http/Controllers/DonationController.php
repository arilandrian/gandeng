<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Menampilkan formulir donasi.
     * Nantinya akan menerima parameter ID kampanye.
     */
    public function createForm() // Untuk rute donations.create yang statis
    {
        return view('donations.create');
    }

    // Metode 'store' yang sebenarnya (nantinya akan memproses submit form)
    // public function store(Request $request) { ... }
}