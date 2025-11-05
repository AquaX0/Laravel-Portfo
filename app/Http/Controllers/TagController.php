<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        // show posts (paginated) and projects with this tag
        $posts = $tag->blogs()->orderBy('published_at', 'desc')->paginate(9);
        $projects = $tag->projects()->orderBy('published_at', 'desc')->get();
        return view('tags.show', compact('tag','posts','projects'));
    }
}
