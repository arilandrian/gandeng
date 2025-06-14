<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Menampilkan dashboard donatur.
     */
    public function dashboard()
    {
        return view('donatur.dashboard');
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