<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiProfil extends Model
{
    use HasFactory;

    protected $table = 'nilai_profil';

    protected $fillable = [
        'id_cagur',
        'id_k',
        'id_sk',
        'nilai_profil',
    ];

    public function cagur()
    {
        return $this->belongsTo(Cagur::class, 'id_cagur');
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sk');
    }
}
