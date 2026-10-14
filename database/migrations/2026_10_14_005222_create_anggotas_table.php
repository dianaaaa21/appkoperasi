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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_anggota', 10)->unique();
            $table->string('nama', 100); // Disamakan menjadi 'nama'
            $table->text('alamat');
            $table->string('telepon', 15);
            $table->date('tanggal_gabung'); // Ditambahkan agar sesuai dengan form input
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};