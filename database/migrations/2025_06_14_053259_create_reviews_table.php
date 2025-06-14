<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Foreign Key ke tabel users (donatur yang memberikan ulasan)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Foreign Key ke tabel campaigns (kampanye yang diulas)
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();

            $table->unsignedTinyInteger('rating'); // Rating (contoh: 1-5). unsignedTinyInteger adalah tipe integer kecil non-negatif.
            $table->text('comment'); // Teks ulasan

            $table->timestamps(); // created_at dan updated_at

            // Opsional: Pastikan satu user hanya bisa memberikan satu ulasan per kampanye
            $table->unique(['user_id', 'campaign_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};