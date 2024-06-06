<?php

namespace App\Http\Controllers;

use App\Models\Cagur;
use App\Models\Kriteria;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class CagurController extends Controller
{
    public function index()
    {
        $cagur = Cagur::all();
        $kriteria = Kriteria::all();
        $sub_kriteria = SubKriteria::all()->groupBy('id_k');

        return view('cagur', compact('cagur', 'kriteria', 'sub_kriteria'));
    }
    public function show(Cagur $cagur)
    {
        return view('cagur', compact('cagur'));
    }
    public function store(Request $request)
    {
        Cagur::create($request->all());

        $kriteriaNames = ['Pendidikan', 'IPK', 'Umur', 'Psikotes', 'Pengalaman Mengajar', 'Sertifikasi Keahlian'];
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

        $kriteriaNames = ['Pendidikan', 'IPK', 'Umur', 'Psikotes', 'Pengalaman Mengajar', 'Sertifikasi Keahlian'];
        $selectedSubKriteria = SubKriteria::where('selected', 1)->get();
        foreach ($kriteriaNames as $kriteriaName) {
            $desc = $request->input($kriteriaName);
            $subKriteria = SubKriteria::where('desc', $desc)->first();

            if ($subKriteria) {
                // Mengambil subkriteria yang dipilih dengan id yang sesuai
                $selectedSubKriteriaItem = $selectedSubKriteria->firstWhere('id', $subKriteria->id);

                if ($selectedSubKriteriaItem) {
                    $perhitungan = new Perhitungan();
                    $perhitungan->id_cagur = Cagur::latest()->first()->id;
                    $perhitungan->id_sk = $subKriteria->id;
                    $perhitungan->ideal_profil = $selectedSubKriteriaItem->id;
                    $perhitungan->gap = $subKriteria->nilai - $selectedSubKriteria->nilai;
                    $perhitungan->bobot_gap = 5;
                    $perhitungan->jumlah_nilai = $perhitungan->gap * $perhitungan->bobot_gap;
                    $perhitungan->rata_rata = $perhitungan->jumlah_nilai / 5;
                    $perhitungan->total_nilai = $perhitungan->rata_rata;
                    $perhitungan->save();
                }
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
