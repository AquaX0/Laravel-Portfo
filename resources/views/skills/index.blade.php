@extends('layouts.app')

@section('title', 'Skills - Portfo')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Skills</h1>
            <a href="{{ route('skills.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($items as $s)
                <div class="p-4 border rounded flex items-center justify-between">
                    <div>
                        <h3 class="font-semibold">{{ $s->name }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('skills.edit', $s->id) }}" class="inline-block px-3 py-1 bg-gray-100 rounded">Edit</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-gray-500">No skills added yet.</div>
            @endforelse
        </div
    </div>
@endsection
