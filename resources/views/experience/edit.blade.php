@extends('layouts.app')

@section('title', 'Edit Experience - Portfo')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Edit Experience</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('experience.update', $item->id) }}" method="post">
            @csrf
            @method('PUT')
            <label class="block mb-2">Job</label>
            <input name="job" value="{{ old('job', $item->job) }}" class="w-full mb-3 px-3 py-2 border rounded" required />

            {{-- company removed per schema simplification --}}

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Start date</label>
                    <input name="start_date" type="date" value="{{ old('start_date', $item->start_date) }}" class="w-full mb-3 px-3 py-2 border rounded" />
                </div>
                <div>
                    <label class="block mb-2">End date</label>
                    <input name="end_date" type="date" value="{{ old('end_date', $item->end_date) }}" class="w-full mb-3 px-3 py-2 border rounded" />
                </div>
            </div>

            <label class="block mb-2">Description</label>
            <textarea name="description" class="w-full mb-3 px-3 py-2 border rounded" rows="6">{{ old('description', $item->description) }}</textarea>

            <div class="text-right">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
@endsection
