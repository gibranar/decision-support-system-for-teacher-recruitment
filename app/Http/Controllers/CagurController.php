<?php

namespace App\Http\Controllers;

use App\Models\Cagur;
use App\Models\Gap;
use App\Models\Kriteria;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\PerhitunganAkhir;
use App\Models\PerhitunganGap;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CagurController extends Controller
{
    public function index()
    {
        $cagurs = Cagur::paginate(5);
        $kriteria = Kriteria::all();
        $sub_kriteria = SubKriteria::all()->groupBy('id_k');

        return view('cagur', compact('cagurs', 'kriteria', 'sub_kriteria'));
    }
    public function show(Cagur $cagur)
    {
        return $cagur;
    }
    public function store(Request $request)
    {
        // Store to Cagur table
        $cagur = Cagur::create($request->all());

        // Ambil ID Cagur yang baru saja dibuat
        $cagurId = $cagur->id;

        // Store to NilaiProfil table
        $kriteriaNames = ['Pendidikan', 'IPK', 'Umur', 'Psikotes', 'Pengalaman_Mengajar', 'Sertifikasi_Keahlian'];
        foreach ($kriteriaNames as $kriteriaName) {
            $desc = $request->input($kriteriaName);
            $subKriteria = SubKriteria::where('desc', $desc)->first();

            if ($subKriteria) {
                $nilaiProfil = new NilaiProfil();
                $nilaiProfil->id_cagur = Cagur::latest()->first()->id;
                $nilaiProfil->id_k = $subKriteria->kriteria->id;
                $nilaiProfil->id_sk = $subKriteria->id;
                $nilaiProfil->nilai_profil = $subKriteria->nilai;
                $nilaiProfil->save();
            }
        }

        // Store to Perhitungan Gap table
        $selectedSubKriterias = SubKriteria::where('selected', 1)->get();
        foreach ($selectedSubKriterias as $selectedSubKriteria) {
            $desc = $request->input($selectedSubKriteria->kriteria->nama);
            $subKriteria = SubKriteria::where('desc', $desc)->first();

            if ($subKriteria) {
                $perhitungan = new PerhitunganGap();
                $perhitungan->id_cagur = $cagurId;
                $perhitungan->id_sk = $subKriteria->id;
                $perhitungan->ideal_profil = $selectedSubKriteria->nilai;

                $nilaiProfilPelamar = NilaiProfil::where('id_cagur', $cagurId)->where('id_sk', $subKriteria->id)->first();
                $perhitungan->gap = $nilaiProfilPelamar->nilai_profil - $selectedSubKriteria->nilai;

                $gap = Gap::where('gap', $perhitungan->gap)->first();
                $perhitungan->bobot_gap = $gap->bobot_nilai;
                $perhitungan->save();
            }
        }

        return redirect()->back();
    }
    public function update(Request $request, Cagur $cagur)
    {
        $cagur->update($request->all());

        return redirect()->route('cagur');
    }
    public function destroy(Cagur $cagur)
    {
        $cagur->delete();

        return redirect()->back();
    }
}
