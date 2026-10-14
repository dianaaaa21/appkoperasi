<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjamans';

    protected $fillable = [
        'kode_pinjaman',
        'anggota_id',
        'jumlah_pinjaman',
        'bunga',
        'lama_angsuran',
        'tanggal_pinjam',
        'status',
    ];

    // Relasi: Setiap Pinjaman diajukan oleh satu Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    // Relasi: Satu Pinjaman memiliki banyak Angsuran (pembayaran cicilan)
    public function angsurans()
    {
        return $this->hasMany(Angsuran::class);
    }
}