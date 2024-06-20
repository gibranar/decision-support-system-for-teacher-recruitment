<?php

namespace App\Http\Controllers;

use App\Models\Cagur;
use App\Models\IdealProfil;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\PerhitunganAkhir;
use App\Models\PerhitunganGap;
use App\Models\Ranking;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $cagurs = Cagur::all();
        $nilaiProfils = NilaiProfil::paginate(12);
        $subKriteria = SubKriteria::where('selected', 1)->get();

        $perhitunganGaps = PerhitunganGap::paginate(12);
        $perhitunganAkhirs = PerhitunganAkhir::paginate(12);
        $rankings = Ranking::with('cagur')
            ->orderBy('rank', 'asc')
            ->paginate(12);

        return view('result', compact('cagurs', 'nilaiProfils', 'subKriteria', 'perhitunganGaps', 'perhitunganAkhirs', 'rankings'));
    }
}
