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
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_simpanan', 10)->unique();
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');
            $table->enum('jenis_simpanan', ['Pokok', 'Wajib', 'Sukarela']);
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpanans');
    }
};