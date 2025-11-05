<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $skills = Skill::all();

        Project::factory()->count(8)->create()->each(function (Project $project) use ($skills) {
            if ($skills->isEmpty()) {
                return;
            }
            $count = rand(1, min(4, $skills->count()));
            $ids = $skills->random($count)->pluck('id')->toArray();
            $project->skills()->attach($ids);
        });
    }
}
