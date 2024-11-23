<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telepon' => $this->faker->numerify('08##########'),
            'alamat' => $this->faker->address,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-20 years'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'jabatan' => $this->faker->jobTitle,
            'tanggal_masuk' => $this->faker->date('Y-m-d', '-5 years'),
            'gaji' => $this->faker->randomFloat(2, 3000000, 10000000),
            'status' => $this->faker->randomElement(['Aktif', 'Nonaktif']),
        ];
    }
}
