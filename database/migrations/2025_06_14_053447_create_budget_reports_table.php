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
        Schema::create('budget_reports', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Foreign Key ke tabel campaigns (laporan ini untuk kampanye mana)
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();

            $table->date('report_date'); // Tanggal penggunaan/pelaporan
            $table->enum('expense_type', ['uang', 'barang', 'jasa']); // Jenis pengeluaran
            $table->text('description'); // Deskripsi penggunaan

            // Jumlah bisa uang atau kuantitas barang, gunakan decimal untuk uang atau string untuk fleksibilitas
            $table->decimal('amount', 15, 2)->nullable(); // Jika jenisnya 'uang'
            $table->string('quantity_description')->nullable(); // Jika jenisnya 'barang'/'jasa' (misal: "50 buku", "2 jam")

            $table->string('proof_url')->nullable(); // Path ke bukti (PDF/gambar)

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
        Schema::dropIfExists('budget_reports');
    }
};