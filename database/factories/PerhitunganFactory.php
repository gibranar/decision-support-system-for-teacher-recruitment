<?php

namespace Database\Factories;

use App\Models\Cagur;
use App\Models\NilaiProfil;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Database\Seeders\SubKriteriaSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerhitunganFactory extends Factory
{
    protected $model = Perhitungan::class;

    public function definition()
    {
        return [
            'id_cagur' => $this->faker->numberBetween(1, 5),
            'id_sk' => $this->faker->numberBetween(1, 2),
            'gap' => $this->faker->numberBetween(0, 5),
            'total_nilai' => $this->faker->numberBetween(50, 100),
            'rank' => $this->faker->numberBetween(1, 10),
        ];
    }
}
