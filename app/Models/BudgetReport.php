<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Untuk relasi belongsTo (ke Campaign)

class BudgetReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'campaign_id',
        'report_date',
        'expense_type',
        'description',
        'amount',
        'quantity_description',
        'proof_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'report_date' => 'date',
        'amount' => 'decimal:2',
        'expense_type' => 'string', // Mengkonfirmasi tipe enum sebagai string
    ];

    /**
     * Get the campaign that owns the BudgetReport.
     * Ini adalah relasi many-to-one (satu laporan anggaran untuk satu kampanye)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}