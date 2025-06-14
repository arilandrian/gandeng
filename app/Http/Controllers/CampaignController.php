<?php
// File: app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Validator; // Import Validator

class CampaignController extends Controller
{
    public function create()
    {
        return view('komunitas.create-campaign');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_donation' => 'required|numeric|min:10000',
            'end_date' => 'required|date|after:today',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->route('campaigns.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // 2. Dapatkan ID Komunitas yang Sedang Login
        $user = Auth::user();
        // Pastikan relasi 'komunitas' ada di model User Anda
        $komunitasId = $user->komunitas->id;

        // 3. Handle Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/campaign_images
            // dan dapatkan path-nya.
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        // 4. Simpan Data ke Database
        Campaign::create([
            'komunitas_id' => $komunitasId,
            'title' => $request->title,
            'description' => $request->description,
            'target_donation' => $request->target_donation,
            'end_date' => $request->end_date,
            'image' => $imagePath,
            'status' => 'active', // Default status saat dibuat
            'current_donation' => 0, // Default donasi awal
        ]);

        // 5. Redirect dengan Pesan Sukses
        return redirect()->route('komunitas.my-programs')->with('success', 'Campaign baru berhasil dibuat!');
    }
}