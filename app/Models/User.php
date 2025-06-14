<?php
// File: app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'role',
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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the komunitas profile associated with the user.
     */
    public function komunitas(): HasOne
    {
        return $this->hasOne(Komunitas::class);
    }

    /**
     * Get the donatur profile associated with the user.
     */
    public function donatur(): HasOne
    {
        return $this->hasOne(Donatur::class);
    }

    /**
     * Get all of the donations for the user.
     */
    public function donations(): HasMany
    {
        // Pastikan foreign key di tabel 'donations' adalah 'user_id'
        return $this->hasMany(Donation::class);
    }

    /**
     * Get all of the reviews for the user.
     */
    public function reviews(): HasMany
    {
        // Pastikan foreign key di tabel 'reviews' adalah 'user_id'
        return $this->hasMany(Review::class);
    }
}