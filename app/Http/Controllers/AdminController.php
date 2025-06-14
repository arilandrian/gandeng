<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Metode lain untuk admin (validasi kampanye, kelola user, dll.) akan ditambahkan nanti
    // public function validateCampaigns() { ... }
    // public function manageUsers() { ... }
}