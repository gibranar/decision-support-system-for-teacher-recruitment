<?php

namespace Database\Factories;

use App\Models\Cagur;
use Illuminate\Database\Eloquent\Factories\Factory;

class CagurFactory extends Factory
{
    protected $model = Cagur::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'telp' => $this->faker->phoneNumber,
            'pendidikan' => $this->faker->randomElement(['D3', 'D4', 'S1', 'S2', 'S3']),
            'ipk' => $this->faker->randomElement(['2.75', '3.00', '3.25', '3.50', '3.75', '4.00']),
            'Umur' => $this->faker->numberBetween(20, 30),
            'Psikotes' => $this->faker->numberBetween(0, 100),
            'Pengalaman_Mengajar' => $this->faker->numberBetween(0, 10),
            'Sertifikasi_Keahlian' => $this->faker->numberBetween(0, 10),
        ];
    }
}
