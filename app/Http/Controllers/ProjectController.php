<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        // Return the top-level `project` view (matches pattern used for experience/skills)
        return view('project');
    }

    public function show(Project $project)
    {
        // eager-load skills and tags to avoid extra queries in the view
        $project->loadMissing(['skills','tags']);
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        $tags = Tag::orderBy('name')->get();
        return view('projects.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'new_tags' => 'nullable|string',
        ]);

        $data['excerpt'] = \Illuminate\Support\Str::limit(strip_tags($data['body']), 220);

        // unique slug
        $base = \Illuminate\Support\Str::slug($data['title']);
        $slug = $base;
        $i = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = file_get_contents($file->getRealPath());
            $data['image_mime'] = $file->getMimeType();
        } else {
            $data['image'] = null;
            $data['image_mime'] = null;
        }

        $project = Project::create($data);

        // attach existing tags
        if ($request->filled('tags')) {
            $project->tags()->attach($request->input('tags'));
        }

        // create and attach new tags
        if ($request->filled('new_tags')) {
            $names = array_filter(array_map('trim', explode(',', $request->input('new_tags'))));
            foreach ($names as $name) {
                if ($name === '') continue;
                $tag = Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
                $project->tags()->attach($tag->id);
            }
        }
        return redirect()->route('projects.show', $project)->with('success', 'Project created.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|image|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'new_tags' => 'nullable|string',
        ]);

        // regenerate slug if title changed
        if ($data['title'] !== $project->title) {
            $base = \Illuminate\Support\Str::slug($data['title']);
            $slug = $base;
            $i = 1;
            while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            $data['slug'] = $slug;
        }

        $data['excerpt'] = \Illuminate\Support\Str::limit(strip_tags($data['body']), 220);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = file_get_contents($file->getRealPath());
            $data['image_mime'] = $file->getMimeType();
        }

        $project->update($data);

        // sync tags if present (keep current if neither provided)
        if ($request->has('tags') || $request->filled('new_tags')) {
            $tagIds = $request->input('tags', []);
            if ($request->filled('new_tags')) {
                $names = array_filter(array_map('trim', explode(',', $request->input('new_tags'))));
                foreach ($names as $name) {
                    if ($name === '') continue;
                    $tag = Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
                    $tagIds[] = $tag->id;
                }
            }
            $project->tags()->sync($tagIds);
        }
        return redirect()->route('projects.show', $project)->with('success', 'Project updated.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project removed.');
    }
}
