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
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id(); // Kolom ID utama

            // Foreign Key ke tabel users
            // Ini akan menghubungkan detail komunitas dengan user yang merupakan akun komunitas tersebut
            $table->foreignId('user_id')->unique()->constrained('users');

            $table->string('nama_organisasi'); // Nama Organisasi (dari form registrasi organisasi)
            $table->string('nomor_telepon')->nullable(); // Nomor Telepon (dari form registrasi organisasi), bisa null
            $table->enum('kategori_organisasi', ['Sosial', 'Lingkungan', 'Pendidikan', 'Kesehatan', 'Kemanusiaan']); // Kategori Organisasi (dari form registrasi organisasi)
            $table->string('document_path')->nullable(); // Path ke dokumen pendukung yang diupload (dari form registrasi organisasi)
            $table->enum('status_validasi', ['pending', 'approved', 'rejected'])->default('pending'); // Status validasi oleh admin

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
        Schema::dropIfExists('komunitas');
    }
};