<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $fillable = [
        'kode_anggota',
        'nama',
        'alamat',
        'telepon',
        'tanggal_gabung',
    ];

    // Relasi: Satu Anggota memiliki banyak Simpanan
    public function simpanans()
    {
        return $this->hasMany(Simpanan::class);
    }

    // Relasi: Satu Anggota memiliki banyak Pinjaman
    public function pinjamans()
    {
        return $this->hasMany(Pinjaman::class);
    }
}