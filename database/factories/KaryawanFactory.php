<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nip' => fake()->unique()->numerify('NIP####'),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'jabatan' => fake()->randomElement(['Manager', 'Staff', 'Supervisor', 'Director', 'Analyst']),
            'departemen' => fake()->randomElement(['IT', 'HR', 'Finance', 'Marketing', 'Operations', 'Sales']),
            'tanggal_masuk' => fake()->dateTimeBetween('-5 years', 'now'),
            'status' => fake()->randomElement(['active', 'inactive']),
            'user_id' => null,
        ];
    }
}
