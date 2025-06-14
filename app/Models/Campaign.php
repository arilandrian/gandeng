<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Untuk relasi belongsTo (ke Komunitas)
use Illuminate\Database\Eloquent\Relations\HasMany;   // Untuk relasi hasMany (ke Donation, Review, BudgetReport)

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'komunitas_id',
        'title',
        'description',
        'category',
        'location',
        'target_amount',
        'current_amount',
        'target_items',
        'current_items',
        'start_date',
        'end_date',
        'image_url',
        'document_url',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'string', // Mengkonfirmasi tipe enum sebagai string
        'category' => 'string', // Mengkonfirmasi tipe enum sebagai string
    ];

    /**
     * Get the komunitas that owns the Campaign.
     * Ini adalah relasi many-to-one (satu kampanye dimiliki oleh satu komunitas)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function komunitas(): BelongsTo
    {
        return $this->belongsTo(Komunitas::class);
    }

    /**
     * Get all of the donations for the Campaign.
     * Ini adalah relasi one-to-many (satu kampanye memiliki banyak donasi)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Get all of the reviews for the Campaign.
     * Ini adalah relasi one-to-many (satu kampanye memiliki banyak ulasan)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get all of the budget reports for the Campaign.
     * Ini adalah relasi one-to-many (satu kampanye memiliki banyak laporan anggaran)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetReports(): HasMany
    {
        return $this->hasMany(BudgetReport::class);
    }
}