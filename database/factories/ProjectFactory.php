<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => \Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1,9999),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraphs(5, true),
            'published_at' => $this->faker->dateTimeBetween('-2 years','now'),
        ];
    }
}
