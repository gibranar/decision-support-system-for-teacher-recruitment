<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    use HasFactory;
    protected $table = 'gap';
    protected $fillable = [
        'gap',
        'bobot_nilai',
        'keterangan',
    ];
}
