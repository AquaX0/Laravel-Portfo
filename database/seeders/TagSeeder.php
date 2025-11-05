<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $list = ['Laravel', 'PHP', 'Tailwind', 'JavaScript', 'Tutorial', 'Portfolio', 'Design', 'Backend', 'Frontend'];
        foreach ($list as $name) {
            Tag::firstOrCreate([
                'slug' => Str::slug($name),
            ], [
                'name' => $name,
            ]);
        }
    }
}
