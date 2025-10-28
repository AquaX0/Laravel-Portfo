<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => \Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1,9999),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraphs(5, true),
            'author' => $this->faker->name(),
            'published_at' => $this->faker->dateTimeBetween('-2 years','now'),
        ];
    }
}
