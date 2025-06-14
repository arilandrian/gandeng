<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Komunitas;
use App\Models\Donatur;
use App\Models\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // === BUAT 1 ADMIN ===
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gandeng.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // === BUAT 1 KOMUNITAS DENGAN 3 CAMPAIGN ===
        $komunitasUser = User::factory()->create([
            'name' => 'Komunitas Hebat',
            'email' => 'komunitas@gandeng.com',
            'password' => Hash::make('password'),
            'role' => 'komunitas',
        ]);

        $komunitasProfil = Komunitas::factory()->create([
            'user_id' => $komunitasUser->id,
            'nama_organisasi' => 'Komunitas Hebat Official',
        ]);
        
        // Buat 3 campaign untuk komunitas ini
        Campaign::factory()->count(3)->create([
            'komunitas_id' => $komunitasProfil->id,
        ]);


        // === BUAT 2 DONATUR ===
        $donaturUser1 = User::factory()->create([
            'name' => 'Budi Donatur',
            'email' => 'budi@gandeng.com',
            'password' => Hash::make('password'),
            'role' => 'donatur',
        ]);
        Donatur::factory()->create(['user_id' => $donaturUser1->id]);
        
        $donaturUser2 = User::factory()->create([
            'name' => 'Siti Donatur',
            'email' => 'siti@gandeng.com',
            'password' => Hash::make('password'),
            'role' => 'donatur',
        ]);
        Donatur::factory()->create(['user_id' => $donaturUser2->id]);
    }
}