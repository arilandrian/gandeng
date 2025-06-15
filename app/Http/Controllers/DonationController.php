<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule; // Pastikan ini ada

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
        $rules = [
            'campaign_id' => 'required|exists:campaigns,id',
            'donation_type' => 'required|in:money,goods',
            'donatur_name' => 'required|string|max:255',
            'donatur_email' => 'required|email|max:255',
            'is_anonymous' => 'nullable|boolean',
            'additional_notes' => 'nullable|string|max:500',
        ];

        // Menambahkan aturan validasi berdasarkan jenis donasi
        // PERHATIKAN PERUBAHAN DI SINI UNTUK MEMASTIKAN `min:10000` HANYA UNTUK `amount`
        $rules['amount'] = Rule::when($request->donation_type === 'money', ['required', 'numeric', 'min:10000']);
        $rules['payment_method'] = Rule::when($request->donation_type === 'money', ['required', 'string']);

        $rules['item_name'] = Rule::when($request->donation_type === 'goods', ['required', 'string', 'max:255']);
        $rules['item_quantity'] = Rule::when($request->donation_type === 'goods', ['required', 'string', 'max:100']);
        $rules['item_description'] = Rule::when($request->donation_type === 'goods', ['nullable', 'string', 'max:1000']);
        $rules['item_photo'] = Rule::when($request->donation_type === 'goods', ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']);

        $validated = $request->validate($rules);

        // Siapkan data untuk disimpan
        $dataToStore = [
            'campaign_id' => $validated['campaign_id'],
            'user_id' => Auth::id(),
            'donation_type' => $validated['donation_type'],
            'donatur_name' => $validated['donatur_name'],
            'donatur_email' => $validated['donatur_email'],
            'is_anonymous' => $validated['is_anonymous'] ?? false, 
            'additional_notes' => $validated['additional_notes'] ?? null, 
            'status' => 'pending',
        ];

        try {
            DB::transaction(function () use ($request, $validated, &$dataToStore) {
                $campaign = Campaign::find($validated['campaign_id']);

                if ($validated['donation_type'] === 'money') {
                    // Pastikan 'amount' dan 'payment_method' diambil dari $validated
                    $dataToStore['amount'] = $validated['amount'];
                    $dataToStore['payment_method'] = $validated['payment_method'];
                    $campaign->increment('current_amount', $validated['amount']); 
                } elseif ($validated['donation_type'] === 'goods') {
                    // Karena sudah divalidasi kondisional, field ini pasti ada di $validated jika donation_type == 'goods'
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
            return back()->withInput()->withErrors(['Terjadi kesalahan, donasi Anda gagal diproses.']); 
        }

        $campaign = Campaign::find($validated['campaign_id']);
        return redirect()->route('campaigns.show', $campaign->slug)->with('success', 'Terima kasih! Donasi Anda telah kami catat dan akan segera diproses.'); 
    }
}