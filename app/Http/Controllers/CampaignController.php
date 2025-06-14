<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    /**
     * Menampilkan daftar semua campaign yang aktif.
     */
    public function index()
    {
        // Mengambil semua campaign yang aktif untuk ditampilkan di halaman utama
        $campaigns = Campaign::with('komunitas')
                            ->where('status', 'active')
                            ->latest()
                            ->paginate(9);

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Menampilkan halaman detail untuk satu campaign.
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\View\View
     */
    public function show(Campaign $campaign)
    {
        // Berkat Route Model Binding, Laravel otomatis menyuntikkan data campaign yang cocok
        // Kirim data campaign tunggal tersebut ke view 'campaigns.show'
        return view('campaigns.show', compact('campaign'));
    }

    /**
     * Menampilkan form untuk membuat campaign baru.
     */
    public function create()
    {
        return view('komunitas.create-campaign');
    }

    /**
     * Menyimpan campaign baru ke database.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'target_donation' => ['required', 'numeric', 'min:50000'],
            'end_date' => ['required', 'date', 'after:today'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ])->validate();

        $komunitas = Auth::user()->komunitas;

        $imagePath = $request->file('image')->store('campaign_images', 'public');

        Campaign::create([
            'komunitas_id' => $komunitas->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'target_donation' => $request->target_donation,
            'end_date' => $request->end_date,
            'status' => 'active',
            'current_donation' => 0,
        ]);

        return redirect()->route('komunitas.my-programs')->with('success', 'Campaign baru berhasil dibuat!');
    }
}