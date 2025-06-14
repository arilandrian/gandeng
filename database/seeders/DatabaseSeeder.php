<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Komunitas;
use App\Models\Donatur;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Review;
use App\Models\BudgetReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting: Tambahkan ini untuk hashing password
use Faker\Factory as Faker; // Opsional: Jika Anda butuh Faker di Seeder, Anda bisa import dan instansiasi seperti ini.
                            // Namun, untuk kasus ini, kita tidak membutuhkannya.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Jika Anda butuh Faker di sini (di luar Factory), Anda bisa instansiasi:
        // $faker = Faker::create();

        // 1. Buat user admin
        User::factory()->create([
            'name' => 'Admin GANDENG',
            'email' => 'admin@gandeng.com',
            'password' => Hash::make('password'), // Password di-hash
            'role' => 'admin',
        ]);

        // 2. Buat beberapa user donatur dan komunitas (Factories akan otomatis membuat User terkait)
        Komunitas::factory(3)->create(); // Membuat 3 komunitas, setiap komunitas punya 1 user terkait
        Donatur::factory(10)->create(); // Membuat 10 donatur, setiap donatur punya 1 user terkait

        // 3. Ambil ID dari Komunitas yang sudah dibuat
        $komunitasIds = Komunitas::all()->pluck('id');
        if ($komunitasIds->isEmpty()) {
            // Fallback jika belum ada komunitas (misal running seeder sebagian), buat satu
            $komunitasIds = [Komunitas::factory()->create()->id];
        }

        // 4. Buat beberapa kampanye
        Campaign::factory(10)->create(function(array $attributes) use ($komunitasIds) {
            return [
                'komunitas_id' => $komunitasIds->random(), // Memilih ID komunitas secara acak dari yang sudah ada
                // Status akan ditentukan oleh CampaignFactory default, atau bisa override di sini
            ];
        });

        // 5. Ambil ID kampanye yang aktif atau sudah selesai
        $campaignIds = Campaign::whereIn('status', ['active', 'completed'])->pluck('id');
        // 6. Ambil ID user donatur
        $donaturUserIds = User::where('role', 'donatur')->pluck('id');

        // 7. Buat Donasi, Ulasan, dan Laporan Anggaran hanya jika ada data yang cukup
        if (!$campaignIds->isEmpty() && !$donaturUserIds->isEmpty()) {
            // Buat beberapa donasi
            Donation::factory(20)->create(function(array $attributes) use ($donaturUserIds, $campaignIds) {
                return [
                    'user_id' => $donaturUserIds->random(), // Memilih ID donatur secara acak
                    'campaign_id' => $campaignIds->random(), // Memilih ID kampanye secara acak
                ];
            });

            // Buat beberapa ulasan
            Review::factory(15)->create(function(array $attributes) use ($donaturUserIds, $campaignIds) {
                return [
                    'user_id' => $donaturUserIds->random(), // Memilih ID donatur secara acak
                    'campaign_id' => $campaignIds->random(), // Memilih ID kampanye secara acak
                ];
            });

            // Buat beberapa laporan anggaran
            BudgetReport::factory(30)->create(function(array $attributes) use ($campaignIds) {
                return [
                    'campaign_id' => $campaignIds->random(), // Memilih ID kampanye secara acak
                ];
            });
        } else {
            echo "Peringatan: Tidak cukup Komunitas, Campaign, atau Donatur untuk membuat Donasi, Ulasan, atau Laporan Anggaran. Pastikan Factories membuat data dasar terlebih dahulu.\n";
        }
    }
}