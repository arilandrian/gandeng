<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    /**
     * Menampilkan form untuk membuat donasi baru untuk campaign tertentu.
     */
    public function create(Campaign $campaign)
    {
        $paymentMethods = config('payment.methods', []);

        return view('donations.create', compact('campaign', 'paymentMethods'));
    }

    /**
     * Menyimpan donasi baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data umum
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'donation_type' => 'required|in:money,goods',
            'donatur_name' => 'required|string|max:255',
            'donatur_email' => 'required|email|max:255',
            'is_anonymous' => 'nullable|boolean',
            'additional_notes' => 'nullable|string|max:500',

            // Validasi kondisional untuk donasi uang
            'amount' => 'required_if:donation_type,money|numeric|min:10000',
            'payment_method' => 'required_if:donation_type,money|string',

            // Validasi kondisional untuk donasi barang
            'item_name' => 'required_if:donation_type,goods|string|max:255',
            'item_quantity' => 'required_if:donation_type,goods|string|max:100',
            'item_description' => 'nullable|string|max:1000',
            'item_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // Siapkan data untuk disimpan, termasuk kolom dari form Anda
        $dataToStore = [
            'campaign_id' => $validated['campaign_id'],
            'user_id' => Auth::id(),
            'donation_type' => $validated['donation_type'],
            'additional_notes' => $validated['message'] ?? null, // Sesuaikan dengan nama di form
            'status' => 'pending',
        ];

        try {
            DB::transaction(function () use ($request, $validated, &$dataToStore) {
                $campaign = Campaign::find($validated['campaign_id']);

                if ($validated['donation_type'] === 'money') {
                    $dataToStore['amount'] = $validated['amount'];
                    $dataToStore['payment_method'] = $validated['payment_method'];
                    $campaign->increment('current_donation', $validated['amount']);
                } elseif ($validated['donation_type'] === 'goods') {
                    $dataToStore['item_name'] = $validated['item_name'];
                    $dataToStore['item_quantity'] = $validated['item_quantity'];
                    $dataToStore['item_description'] = $validated['item_description'] ?? null;
                    if ($request->hasFile('item_photo')) {
                        $path = $request->file('item_photo')->store('donation_items', 'public');
                        $dataToStore['item_photo_url'] = $path;
                    }
                }

                Donation::create($dataToStore);
            });
        } catch (\Throwable $e) {
            Log::error('Donation Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan, donasi Anda gagal diproses.');
        }

        $campaign = Campaign::find($validated['campaign_id']);
        return redirect()->route('campaigns.show', $campaign)->with('success', 'Terima kasih! Donasi Anda telah kami catat dan akan segera diproses.');
    }
}
