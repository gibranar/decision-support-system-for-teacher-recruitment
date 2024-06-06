<?php

namespace Database\Seeders;

use App\Models\Cagur;
use App\Models\IdealProfil;
use App\Models\Kriteria;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cagur::factory()->count(5)->create();
        $this->call(KriteriaSeeder::class);
        $this->call(SubKriteriaSeeder::class);
        // IdealProfil::factory()->count(6)->create();
        // NilaiProfil::factory()->count(2)->create();
        // Perhitungan::factory()->count(2)->create();
    }
}
