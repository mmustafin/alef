<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\PatientUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientUserFactory extends Factory
{
    protected $model = PatientUser::class;

    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id'),
            'patient_id' => Patient::query()->inRandomOrder()->value('id'),
            'date' => fake()->dateTimeBetween('-10 days', '+0 days'),
            'weight' => fake()->randomFloat(0, 1, 10),
            'temperature' => fake()->randomFloat(0, 1, 10),
            'well_being' => fake()->randomFloat(0, 1, 10),
        ];
    }
}
