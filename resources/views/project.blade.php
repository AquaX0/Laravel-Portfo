@extends('layouts.app')

@section('title', 'Projects - Portfo')

@section('content')
    @php
        $items = \App\Models\Project::orderBy('published_at', 'desc')->get();
    @endphp

    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Projects</h1>
                <p class="mt-1 text-gray-600">Recent projects and demos</p>
            </div>
            <div>
                <a href="{{ route('projects.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($items as $item)
                <article class="bg-white rounded-xl overflow-hidden shadow-sm">
                    <a href="{{ route('projects.show', $item) }}" class="block h-56 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if($item->image)
                            <img class="w-full h-56 object-cover" src="data:{{ $item->image_mime }};base64,{{ base64_encode($item->image) }}" alt="{{ $item->title }}">
                        @else
                            <img class="w-full h-56 object-cover" src="{{ url('/images/default-blog.png') }}" alt="{{ $item->title }}">
                        @endif
                    </a>
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4">{{ $item->title }}</h2>
                            <div class="flex items-center text-sm text-gray-500 font-medium space-x-4 mb-4">
                                <span>{{ \Illuminate\Support\Carbon::parse($item->published_at)->format('M j, Y') }}</span>
                            </div>
                            <div class="relative">
                                <p class="text-gray-400 overflow-hidden max-h-24">{{ $item->excerpt }}</p>
                                <div class="absolute inset-x-0 bottom-0 h-8 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('projects.edit', $item->id) }}" class="inline-block px-3 py-1 bg-gray-100 rounded">Edit</a>
                                <form action="{{ route('projects.destroy', $item->id) }}" method="post" class="inline-block ml-2" onsubmit="return confirm('Delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-100 text-red-700 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                </article>
            @empty
                <div class="col-span-full text-center text-gray-500">No projects found.</div>
            @endforelse
        </div>

        <div class="mt-8">
            {{-- no pagination here because we load all items for the top-level view --}}
        </div>
    </div>
@endsection
