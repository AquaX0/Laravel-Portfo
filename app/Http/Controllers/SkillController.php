<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        // Controller now returns the top-level `skills` view which queries the model itself.
        return view('skills');
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Skill::create($data);
        return redirect()->route('skills.index')->with('success', 'Skill added.');
    }

    public function edit($id)
    {
        $item = Skill::findOrFail($id);
        return view('skills.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Skill::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $item->update($data);
        return redirect()->route('skills.index')->with('success', 'Skill updated.');
    }
}
