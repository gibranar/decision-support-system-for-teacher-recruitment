<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealProfil extends Model
{
    use HasFactory;
    protected $table = 'ideal_profil';
    protected $fillable = [
        'id_k',
        'id_sk',
        'nilai_ideal',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_k', 'id');
    }
    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sk', 'id');
    }
}
