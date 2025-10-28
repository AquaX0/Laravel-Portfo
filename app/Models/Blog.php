<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'author',
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
}
