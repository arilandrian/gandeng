<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Untuk relasi belongsTo (ke User)
use Illuminate\Database\Eloquent\Relations\HasMany;   // Untuk relasi hasMany (ke Campaign)

class Komunitas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nama_organisasi',
        'nomor_telepon',
        'kategori_organisasi',
        'document_path',
        'status_validasi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status_validasi' => 'string', // Mengkonfirmasi tipe enum sebagai string
        'kategori_organisasi' => 'string', // Mengkonfirmasi tipe enum sebagai string
    ];

    /**
     * Get the user that owns the Komunitas.
     * Ini adalah relasi one-to-one (satu komunitas dimiliki oleh satu user)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the campaigns for the Komunitas.
     * Ini adalah relasi one-to-many (satu komunitas memiliki banyak kampanye)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }
}