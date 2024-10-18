<?php

namespace Database\Seeders;

use App\Models\DiseaseHandbook;
use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\DiseaseHandbookFactory;
use Database\Factories\PatientUserFactory;
use Database\Factories\PatientFactory;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);



        DiseaseHandbookFactory::new()->count(10)->create();

        PatientFactory::new()->count(50)->create();

        $user = UserFactory::new()
            ->count(10)
            ->create();

        foreach (Patient::all() as $patient) {
            $faker = Factory::create();
            $user = User::query()->inRandomOrder()->value('id');
            $patient->users()->attach($user, [
                'date' => $faker->dateTimeBetween('+0 days', '+1 month'),
                'weight' => $faker->randomFloat(0, 1, 10),
                'temperature' => $faker->randomFloat(0, 1, 10),
                'well_being' => $faker->randomFloat(0, 1, 10),
            ]);
        }
    }
}
