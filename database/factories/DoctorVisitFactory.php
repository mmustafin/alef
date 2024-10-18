<?php

namespace Database\Factories;

use App\Models\DiseaseHandbook;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorVisit>
 */
class DoctorVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'patient_id' => Patient::query()->inRandomOrder()->value('id'),
            'weight' => $this->faker->randomFloat(0, 1, 10),
            'temperature' => $this->faker->randomFloat(0, 1, 10),
            'well_being' => $this->faker->randomFloat(0, 1, 10),
            'disease_handbook_id' => DiseaseHandbook::query()->inRandomOrder()->value('id'),
            'disease_status' => fake()->boolean()
        ];
    }
}
