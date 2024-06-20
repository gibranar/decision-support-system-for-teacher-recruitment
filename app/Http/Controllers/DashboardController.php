<?php

namespace App\Http\Controllers;

use App\Models\Cagur;
use App\Models\Gap;
use App\Models\Kriteria;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\PerhitunganAkhir;
use App\Models\PerhitunganGap;
use App\Models\Ranking;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $gaps = Gap::all();
        $rank = Ranking::orderBy('rank', 'asc')->take(5)->get();
        
        $top1 = $rank->first();
        $top2 = $rank->skip(1)->first();
        $top3 = $rank->skip(2)->first();
        $top4 = $rank->skip(3)->first();
        $top5 = $rank->skip(4)->first();

        $kriteria1 = Kriteria::first();
        $kriteria = Kriteria::all()->skip(1);
        $kriteriaId = $kriteria->pluck('id');
        $sub_kriteria1 = SubKriteria::where('id_k', $kriteria1->id)->get();
        $sub_kriteria = SubKriteria::all()->groupBy('id_k');

        return view('index', compact('gaps', 'top1', 'top2', 'top3', 'top4', 'top5', 'kriteria1', 'kriteria', 'sub_kriteria1', 'sub_kriteria'));
    }
}
