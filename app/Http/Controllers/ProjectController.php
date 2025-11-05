<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Return the top-level `project` view (matches pattern used for experience/skills)
        return view('project');
    }

    public function show(Project $project)
    {
        // eager-load skills to avoid an extra query in the view
        $project->loadMissing('skills');
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|file|image|max:2048',
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
        return redirect()->route('projects.show', $project)->with('success', 'Project updated.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project removed.');
    }
}
