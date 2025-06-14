<?php

namespace App\Models;

// Pastikan import trait dan kelas yang dibutuhkan
use Illuminate\Contracts\Auth\MustVerifyEmail; // Opsional, jika fitur verifikasi email diaktifkan
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne; // Untuk relasi one-to-one (Komunitas, Donatur)
use Illuminate\Database\Eloquent\Relations\HasMany; // Untuk relasi one-to-many (Donation, Review)
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Memastikan kelas ini meng-extend Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Penting: tambahkan 'role' agar bisa di-assign secara massal
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Mengubah ke objek datetime
        'password' => 'hashed', // Menggunakan hashing otomatis oleh Laravel
    ];

    /**
     * Get the komunitas associated with the User.
     * Ini adalah relasi one-to-one (satu user bisa jadi satu komunitas)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function komunitas(): HasOne
    {
        return $this->hasOne(Komunitas::class);
    }

    /**
     * Get the donatur associated with the User.
     * Ini adalah relasi one-to-one (satu user bisa jadi satu donatur)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function donatur(): HasOne
    {
        return $this->hasOne(Donatur::class);
    }

    /**
     * Get all of the donations for the User.
     * Ini adalah relasi one-to-many (satu user bisa punya banyak donasi)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Get all of the reviews for the User.
     * Ini adalah relasi one-to-many (satu user bisa punya banyak ulasan)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}