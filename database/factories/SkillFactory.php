<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    public function definition()
    {
        $skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Dart', 'Python', 'SQL', 'Git'];
        return [
            'name' => $this->faker->randomElement($skills),
        ];
    }
}
