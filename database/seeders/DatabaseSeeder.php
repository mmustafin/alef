<?php

namespace Database\Seeders;

use App\Models\DiseaseHandbook;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\DiseaseHandbookFactory;
use Database\Factories\DoctorVisitFactory;
use Database\Factories\PatientFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        UserFactory::new()->count(10)->create();

        DiseaseHandbookFactory::new()->count(10)->create();

        PatientFactory::new()->count(50)->create();

        DoctorVisitFactory::new()->count(100)->create();
    }
}
