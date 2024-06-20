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
        $perhitunganAkhirs = PerhitunganAkhir::paginate(4);
        $rankings = Ranking::with('cagur')
            ->orderBy('rank', 'asc')
            ->paginate(5);

        return view('result', compact('cagurs', 'nilaiProfils', 'subKriteria', 'perhitunganGaps', 'perhitunganAkhirs', 'rankings'));
    }
    public function store()
    {
        $cagurs = Cagur::doesntHave('perhitunganAkhir')->get();
        foreach ($cagurs as $cagur) {
            $cagurId = $cagur->id;

            $SubKriteriaCoreId = SubKriteria::where('selected', 1)
                ->join('kriteria', 'sub_kriteria.id_k', '=', 'kriteria.id')
                ->select('sub_kriteria.*', 'kriteria.jenis')
                ->where('kriteria.jenis', 'Core Factor')->first();
            $SubKriteriaSecondaryId = SubKriteria::where('selected', 1)
                ->join('kriteria', 'sub_kriteria.id_k', '=', 'kriteria.id')
                ->select('sub_kriteria.*', 'kriteria.jenis')
                ->where('kriteria.jenis', 'Secondary Factor')->first();

            $perhitunganCore = PerhitunganGap::where('id_cagur', $cagurId)
                ->join('sub_kriteria', 'perhitungan_gap.id_sk', '=', 'sub_kriteria.id')
                ->join('kriteria', 'sub_kriteria.id_k', '=', 'kriteria.id')
                ->select('perhitungan_gap.*', 'kriteria.jenis')
                ->where('kriteria.jenis', 'Core Factor')->get();
            $perhitunganSecondary = PerhitunganGap::where('id_cagur', $cagurId)
                ->join('sub_kriteria', 'perhitungan_gap.id_sk', '=', 'sub_kriteria.id')
                ->join('kriteria', 'sub_kriteria.id_k', '=', 'kriteria.id')
                ->select('perhitungan_gap.*', 'kriteria.jenis')
                ->where('kriteria.jenis', 'Secondary Factor')->get();

            $sumCore = $perhitunganCore->sum('bobot_gap');
            $sumSecondary = $perhitunganSecondary->sum('bobot_gap');

            // Simpan hasil perhitungan ke tabel perhitungan_akhir
            $jenisKriterias = ['Core Factor', 'Secondary Factor'];
            foreach ($jenisKriterias as $jenisKriteria) {
                $perhitunganAkhir = new PerhitunganAkhir();
                $perhitunganAkhir->id_cagur = $cagurId;

                if ($jenisKriteria == 'Core Factor') {
                    $perhitunganAkhir->id_sk = $SubKriteriaCoreId->id;
                    $perhitunganAkhir->jumlah_nilai = $sumCore;
                    $perhitunganAkhir->rata_rata = $perhitunganAkhir->jumlah_nilai / 3;
                    $perhitunganAkhir->total_rata_rata = $perhitunganAkhir->rata_rata * 0.7;
                } else if ($jenisKriteria == 'Secondary Factor') {
                    $perhitunganAkhir->id_sk = $SubKriteriaSecondaryId->id;
                    $perhitunganAkhir->jumlah_nilai = $sumSecondary;
                    $perhitunganAkhir->rata_rata = $perhitunganAkhir->jumlah_nilai / 3;
                    $perhitunganAkhir->total_rata_rata = $perhitunganAkhir->rata_rata * 0.3;
                }
                $perhitunganAkhir->save();
            }
        }

        return back()->with('success', 'Data berhasil disimpan');
    }
    public function storeRank()
    {
        $cagurs = Cagur::doesntHave('ranking')->get();
        foreach ($cagurs as $cagur) {
            $cagurId = $cagur->id;

            // Menghitung total_nilai untuk cagur tersebut
            $total_nilai = PerhitunganAkhir::where('id_cagur', $cagurId)->sum('total_rata_rata');

            // Menyimpan entri baru ke dalam tabel ranking
            $ranking = new Ranking();
            $ranking->id_cagur = $cagurId;
            $ranking->total_nilai = $total_nilai;
            $ranking->save();

            // Mengambil semua entri di tabel ranking dan mengurutkannya berdasarkan total_nilai
            $ranks = Ranking::orderBy('total_nilai', 'desc')->get();

            // Menghitung ulang peringkat untuk semua entri
            $rank = 1;
            foreach ($ranks as $rankedItem) {
                Ranking::where('id_cagur', $rankedItem->id_cagur)
                    ->update(['rank' => $rank++]);
            }
        }

        return redirect()->route('result')->with('success', 'Data berhasil disimpan');
    }
}
