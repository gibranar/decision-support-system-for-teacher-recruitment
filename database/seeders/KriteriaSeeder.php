<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::insert([
            [
                'nama' => 'Pendidikan',
                'jenis' => 'Core Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'IPK',
                'jenis' => 'Core Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Umur',
                'jenis' => 'Secondary Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Psikotes',
                'jenis' => 'Secondary Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengalaman Mengajar',
                'jenis' => 'Core Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sertifikasi Keahlian',
                'jenis' => 'Secondary Factor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
