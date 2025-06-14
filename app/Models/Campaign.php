<?php
// File: app/Models/Campaign.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import class Str

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
        'slug',
        'description',
        'image',
        'target_donation',
        'current_donation',
        'end_date',
        'status',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($campaign) {
            $campaign->slug = Str::slug($campaign->title);
        });
    }

    /**
     * Get the community that owns the campaign.
     */
    public function komunitas()
    {
        return $this->belongsTo(Komunitas::class);
    }
}