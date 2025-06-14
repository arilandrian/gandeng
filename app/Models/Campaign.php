<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'komunitas_id',
        'title',
        'slug',
        'description',
        'image',
        'target_donation',
        'current_donation',
        'end_date',
        'status',
    ];

    /**
     * Otomatis membuat slug dari title saat campaign dibuat.
     */
    protected static function booted()
    {
        static::creating(function ($campaign) {
            $campaign->slug = Str::slug($campaign->title);
        });
    }

    /**
     * Relasi ke model Komunitas.
     */
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }

    /**
     * Accessor untuk menghitung persentase donasi.
     * Ini akan membuat properti "donation_percentage" tersedia.
     */
    public function getDonationPercentageAttribute(): float
    {
        // Gunakan 'target_amount' dan 'current_amount' sesuai nama kolom dari dd()
        if ($this->target_amount > 0 && $this->current_amount > 0) {
            $percentage = ($this->current_amount / $this->target_amount) * 100;
            return round($percentage, 2);
        }
        return 0;
    }
}
