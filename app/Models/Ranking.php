<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $table = 'ranking';
    protected $fillable = [
        'id_cagur',
        'total_nilai',
        'rank',
    ];
    public function cagur()
    {
        return $this->belongsTo(Cagur::class, 'id_cagur');
    }
    public function perhitunganAkhir()
    {
        return $this->hasMany(PerhitunganAkhir::class, 'id_cagur');
    }
}
