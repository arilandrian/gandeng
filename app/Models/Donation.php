<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Untuk relasi belongsTo (ke User, Campaign)

class Donation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'donation_type',
        'amount',
        'payment_method',
        'item_name',
        'item_quantity',
        'item_description',
        'item_photo_url',
        'additional_notes',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'donation_type' => 'string', // Mengkonfirmasi tipe enum sebagai string
        'status' => 'string', // Mengkonfirmasi tipe enum sebagai string
    ];

    /**
     * Get the user that owns the Donation.
     * Ini adalah relasi many-to-one (satu donasi dimiliki oleh satu user)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the campaign that the Donation belongs to.
     * Ini adalah relasi many-to-one (satu donasi untuk satu kampanye)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}