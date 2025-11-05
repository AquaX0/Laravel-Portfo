<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Tag;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::all();

        Blog::factory()->count(9)->create()->each(function (Blog $post) use ($tags) {
            if ($tags->isEmpty()) return;
            $count = rand(1, min(3, $tags->count()));
            $ids = $tags->random($count)->pluck('id')->toArray();
            $post->tags()->attach($ids);
        });
    }
}
