<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAkhir extends Model
{
    use HasFactory;
    protected $table = 'perhitungan_akhir';
    protected $fillable = [
        'id_cagur',
        'id_sk',
        'nilai_profil',
        'bobot_nilai',
    ];
    public function nilaiProfil()
    {
        return $this->belongsTo(NilaiProfil::class, 'id_cagur', 'id_sk');
    }

    public function idealProfil()
    {
        return $this->belongsTo(IdealProfil::class, 'id_sk');
    }
    
    public function cagur()
    {
        return $this->belongsTo(Cagur::class, 'id_cagur');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_k');
    }
    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sk');
    }
}
