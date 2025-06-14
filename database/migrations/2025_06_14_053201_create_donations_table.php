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
        Schema::create('donations', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Foreign Key ke tabel users (donatur yang melakukan donasi)
            // Jika Anda memisahkan 'donaturs' ke tabel terpisah, maka ini akan menjadi 'donatur_id'
            // Untuk kesederhanaan, kita bisa asumsikan user_id ini adalah user dengan role 'donatur'
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Foreign Key ke tabel campaigns (kampanye yang didonasi)
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();

            $table->enum('donation_type', ['money', 'goods']); // Tipe donasi: uang atau barang

            // Kolom untuk donasi uang
            $table->decimal('amount', 15, 2)->nullable(); // Nominal donasi uang, bisa null jika donasi barang
            $table->string('payment_method')->nullable(); // Metode pembayaran (e.g., 'bca', 'gopay')

            // Kolom untuk donasi barang
            $table->string('item_name')->nullable(); // Nama barang
            $table->string('item_quantity')->nullable(); // Jumlah/kuantitas barang (misal: "50 buah", "10 kg")
            $table->text('item_description')->nullable(); // Deskripsi barang
            $table->string('item_photo_url')->nullable(); // Path ke foto barang (opsional)

            $table->text('additional_notes')->nullable(); // Catatan tambahan dari donatur

            // Status donasi (sesuai alur donasi)
            $table->enum('status', ['pending', 'confirmed', 'rejected', 'delivered'])->default('pending');

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};