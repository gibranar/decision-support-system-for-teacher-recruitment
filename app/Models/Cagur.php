<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cagur extends Model
{
    use HasFactory;

    protected $table = 'cagur';

    protected $fillable = [
        'nama',
        'telp',
        'Pendidikan',
        'IPK',
        'Umur',
        'Psikotes',
        'Pengalaman_Mengajar',
        'Sertifikasi_Keahlian',
    ];

    public function nilaiProfil()
    {
        return $this->hasMany(NilaiProfil::class, 'id_cagur');
    }

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class, 'id_cagur');
    }
}
