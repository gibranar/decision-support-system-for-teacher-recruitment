<?php

namespace App\Http\Controllers;

use App\Models\Cagur;
use App\Models\IdealProfil;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\Ranking;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $cagur = Cagur::all();
        $nilaiProfil = NilaiProfil::all();
        $subKriteria = SubKriteria::where('selected', 1)->get();

        $perhitungan = Perhitungan::all();
        $ranking = Ranking::with('cagur')
            ->orderBy('rank', 'asc')
            ->get();

        return view('result', compact('cagur', 'nilaiProfil', 'subKriteria', 'perhitungan', 'ranking'));
    }
}
