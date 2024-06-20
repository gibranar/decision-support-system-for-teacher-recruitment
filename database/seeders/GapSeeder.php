<?php

namespace Database\Seeders;

use App\Models\Gap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['gap' => 0, 'bobot_nilai' => '5', 'keterangan' => 'Tidak Ada Selisih (kompetensi sesuai dengan yang dibutuhkan)'],
            ['gap' => 1, 'bobot_nilai' => '4.5', 'keterangan' => 'Kompetensi individu kelebihan 1 tingkat/level'],
            ['gap' => -1, 'bobot_nilai' => '4', 'keterangan' => 'Kompetensi individu kekurangan 1 tingkat/level'],
            ['gap' => 2, 'bobot_nilai' => '3.5', 'keterangan' => 'Kompetensi individu kelebihan 2 tingkat/level'],
            ['gap' => -2, 'bobot_nilai' => '3', 'keterangan' => 'Kompetensi individu kekurangan 2 tingkat/level'],
            ['gap' => 3, 'bobot_nilai' => '2.5', 'keterangan' => 'Kompetensi individu kelebihan 3 tingkat/level'],
            ['gap' => -3, 'bobot_nilai' => '2', 'keterangan' => 'Kompetensi individu kekurangan 3 tingkat/level'],
            ['gap' => 4, 'bobot_nilai' => '1.5', 'keterangan' => 'Kompetensi individu kelebihan 4 tingkat/level'],
            ['gap' => -4, 'bobot_nilai' => '1', 'keterangan' => 'Kompetensi individu kekurangan 4 tingkat/level'],
        ];

        foreach ($data as $item) {
            Gap::create($item);
        }
    }
}
