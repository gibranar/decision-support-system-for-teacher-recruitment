<?php

namespace Database\Factories;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdealProfil>
 */
class IdealProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_k' => $this->faker->numberBetween(0, 4),
            'id_sk' => $this->faker->numberBetween(0, 4),
            'nilai_ideal' => $this->faker->numberBetween(0, 4),
        ];
    }
}
