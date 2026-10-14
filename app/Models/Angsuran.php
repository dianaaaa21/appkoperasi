<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Angsuran extends Model
{
    use HasFactory;

    protected $table = 'angsurans';

    protected $fillable = [
        'kode_angsuran',
        'pinjaman_id',
        'jumlah_bayar',
        'tanggal_bayar',
        'ke_angsuran',
    ];

    // Relasi: Setiap Angsuran merujuk pada satu Pinjaman tertentu
    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}