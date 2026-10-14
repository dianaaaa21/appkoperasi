<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Simpanan extends Model
{
    use HasFactory;

    protected $table = 'simpanans';

    protected $fillable = [
        'kode_simpanan',
        'anggota_id',
        'jenis_simpanan',
        'jumlah',
        'tanggal',
    ];

    // Relasi: Setiap Simpanan dimiliki oleh satu Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}