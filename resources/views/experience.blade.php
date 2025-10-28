@extends('layouts.app')

@section('title', 'Experience - Portfo')

@section('content')
    @php
        $items = \App\Models\Experience::orderBy('start_date', 'desc')->get();
    @endphp

    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Experience</h1>
            <a href="{{ route('experience.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add</a>
        </div>

        @forelse($items as $exp)
            <div class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">{{ $exp->job }}</h2>
                <div class="text-sm text-gray-500">{{ $exp->start_date }} @if($exp->end_date) — {{ $exp->end_date }}@endif</div>
                <p class="mt-2 text-gray-700">{{ $exp->description }}</p>
                <div class="mt-3">
                    <a href="{{ route('experience.edit', $exp->id) }}" class="inline-block px-3 py-1 bg-gray-100 rounded">Edit</a>
                </div>
            </div>
        @empty
            <div class="text-gray-500">No experience added yet.</div>
        @endforelse
    </div>
@endsection
