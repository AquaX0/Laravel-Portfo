<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // create a test user if one doesn't already exist (idempotent)
        \App\Models\User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // Seed blog posts (added by assistant)
        $this->call(\Database\Seeders\BlogSeeder::class);
        // Seed skills and experiences
        $this->call(\Database\Seeders\SkillSeeder::class);
        $this->call(\Database\Seeders\ExperienceSeeder::class);
        // Seed projects
        $this->call(\Database\Seeders\ProjectSeeder::class);
    }
}
