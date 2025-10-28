<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        // Controller now returns the top-level `experience` view which queries the model itself.
        return view('experience');
    }

    public function create()
    {
        return view('experience.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'job' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Experience::create($data);
        return redirect()->route('experience.index')->with('success', 'Experience added.');
    }

    public function edit($id)
    {
        $item = Experience::findOrFail($id);
        return view('experience.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Experience::findOrFail($id);
        $data = $request->validate([
            'job' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);
        $item->update($data);
        return redirect()->route('experience.index')->with('success', 'Experience updated.');
    }
}
