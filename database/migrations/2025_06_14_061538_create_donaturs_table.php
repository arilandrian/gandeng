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
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id(); // Kolom ID utama

            // Foreign Key ke tabel users
            // Ini akan menghubungkan detail donatur dengan user yang merupakan akun donatur tersebut
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();

            $table->string('domisili'); // Domisili donatur (dari form registrasi donatur)

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
        Schema::dropIfExists('donaturs');
    }
};