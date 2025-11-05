<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Skill;
use App\Models\Tag;

class Project extends Model
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
     * The skills that belong to the project.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Tags attached to the project.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
