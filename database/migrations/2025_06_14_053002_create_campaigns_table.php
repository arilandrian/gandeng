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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Foreign Key ke tabel komunitas, karena setiap kampanye dibuat oleh satu komunitas
            $table->foreignId('komunitas_id')->constrained('komunitas')->cascadeOnDelete();

            $table->string('title'); // Judul Program
            $table->text('description'); // Deskripsi Program
            $table->enum('category', ['Pendidikan', 'Kesehatan', 'Lingkungan', 'Kemanusiaan']); // Kategori
            $table->string('location'); // Lokasi Program
            $table->decimal('target_amount', 15, 2); // Target Dana (contoh: 15 digit total, 2 di belakang koma)
            $table->decimal('current_amount', 15, 2)->default(0.00); // Jumlah Terkumpul saat ini

            $table->string('target_items')->nullable(); // Target Barang (opsional, jika donasi barang spesifik)
            $table->string('current_items')->nullable(); // Jumlah Barang Terkumpul (opsional)

            $table->date('start_date'); // Tanggal Mulai Penggalangan
            $table->date('end_date'); // Tanggal Berakhir Penggalangan

            $table->string('image_url')->nullable(); // Path ke gambar program
            $table->string('document_url')->nullable(); // Path ke dokumen pendukung kampanye (PDF, opsional)

            // Status kampanye sesuai alur validasi dan siklus hidup program
            $table->enum('status', ['pending_validation', 'active', 'completed', 'rejected', 'paused'])->default('pending_validation');

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
        Schema::dropIfExists('campaigns');
    }
};