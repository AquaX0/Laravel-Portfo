<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // create a set of common skills
        $list = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Dart', 'Python', 'SQL', 'Git'];
        foreach ($list as $name) {
            Skill::firstOrCreate(['name' => $name]);
        }

        // some random extras
        Skill::factory()->count(4)->create();
    }
}
