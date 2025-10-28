@extends('layouts.app')

@section('title', 'Create Blog Post - Portfo')

@section('content')
    <div class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="text-2xl font-bold mb-6">Create a new blog post</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blog.store') }}" method="post">
            @csrf

            <label class="block mb-2">Title</label>
            <input name="title" value="{{ old('title') }}" class="w-full mb-3 px-3 py-2 border rounded" required />

            <label class="block mb-2">Body</label>
            <textarea name="body" class="w-full mb-3 px-3 py-2 border rounded" rows="8">{{ old('body') }}</textarea>

            <label class="block mb-2">Author</label>
            <input name="author" value="{{ old('author') }}" class="w-full mb-3 px-3 py-2 border rounded" />

            <label class="block mb-2">Publish date (optional)</label>
            <input name="published_at" type="datetime-local" value="{{ old('published_at') }}" class="w-full mb-3 px-3 py-2 border rounded" />

            <div class="text-right">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Publish</button>
            </div>
        </form>
    </div>
@endsection
