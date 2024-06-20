<?php

namespace Database\Factories;

use App\Models\Cagur;
use App\Models\NilaiProfil;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiProfilFactory extends Factory
{
    protected $model = NilaiProfil::class;

    public function definition()
    {
        return [
            'id_cagur' => $this->faker->numberBetween(0, 4),
            'id_k' => $this->faker->numberBetween(0, 4),
            'id_sk' => $this->faker->numberBetween(0, 4),
            'nilai_profil' => $this->faker->numberBetween(0, 4),
        ];
    }
}

