<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Show list of blog posts (paginated).
     */
    public function index()
    {
        $posts = Blog::orderBy('published_at', 'desc')->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show form to create a new blog post.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created blog post.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|image|max:2048',
        ]);

    // create an excerpt from body (auto-generated)
    $data['excerpt'] = \Illuminate\Support\Str::limit(strip_tags($data['body']), 220);

    // create a unique slug
        $base = Str::slug($data['title']);
        $slug = $base;
        $i = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $data['slug'] = $slug;

        // handle image upload or fallback to default file in resources/images
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = file_get_contents($file->getRealPath());
            $data['image_mime'] = $file->getMimeType();
        } else {
            // don't store a default image in the DB; leave fields null and render the
            // `resources/images/default-blog.png` at view time when needed
            $data['image'] = null;
            $data['image_mime'] = null;
        }

        $post = Blog::create($data);

        return redirect()->route('blog.show', $post)->with('success', 'Blog post created.');
    }

    /**
     * Show a single post.
     */
    public function show(Blog $post)
    {
        return view('blog.show', compact('post'));
    }

    /**
     * Delete a blog post.
     */
    public function destroy(Blog $post)
    {
        $post->delete();
        return redirect()->route('blog.index')->with('success', 'Blog post deleted.');
    }
}
