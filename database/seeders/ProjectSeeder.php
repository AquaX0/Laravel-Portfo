<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tag;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $skills = Skill::all();
        $tags = Tag::all();

        Project::factory()->count(8)->create()->each(function (Project $project) use ($skills, $tags) {
            if ($skills->isNotEmpty()) {
                $count = rand(1, min(4, $skills->count()));
                $ids = $skills->random($count)->pluck('id')->toArray();
                $project->skills()->attach($ids);
            }
            if ($tags->isNotEmpty()) {
                $count = rand(1, min(3, $tags->count()));
                $ids = $tags->random($count)->pluck('id')->toArray();
                $project->tags()->attach($ids);
            }
        });
    }
}
