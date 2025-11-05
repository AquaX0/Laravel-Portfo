<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'image',
        'image_mime',
    ];

    /**
     * Use the slug for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The tags attached to the blog post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
