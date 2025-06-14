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
    public function up(): void // Menggunakan void karena Laravel 10/11/12
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('name'); // Nama pengguna/organisasi
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Untuk verifikasi email, bisa null
            $table->string('password'); // Password terenkripsi
            $table->enum('role', ['donatur', 'komunitas', 'admin'])->default('donatur'); // Kolom role
            $table->rememberToken(); // Untuk fitur "ingat saya"
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void // Menggunakan void
    {
        Schema::dropIfExists('users');
    }
};