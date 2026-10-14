<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjaman', 10)->unique();
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');
            $table->decimal('jumlah_pinjaman', 12, 2);
            $table->decimal('bunga', 5, 2);
            $table->integer('lama_angsuran');
            $table->date('tanggal_pinjam');
            $table->enum('status', ['Belum Lunas', 'Lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamans');
    }
};