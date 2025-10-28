<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('-6 years', 'now');
        $end = $this->faker->boolean(60) ? $this->faker->dateTimeBetween($start, 'now') : null;

        return [
            'job' => $this->faker->jobTitle(),
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end ? $end->format('Y-m-d') : null,
            'description' => $this->faker->paragraphs(2, true),
        ];
    }
}
