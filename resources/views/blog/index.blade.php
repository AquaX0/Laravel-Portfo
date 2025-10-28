@extends('layouts.app')

@section('title', 'My Blog - Portfo')

@section('content')
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">My Blog</h1>
                <p class="mt-1 text-gray-600">Latest articles, tutorials and news</p>
            </div>
            <div>
                <a href="{{ route('blog.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Create post</a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($posts as $post)
                <article class="bg-white rounded-xl overflow-hidden shadow-sm">
                    <a href="{{ route('blog.show', $post) }}" class="block h-56 bg-gray-100 flex items-center justify-center overflow-hidden">
                        @if($post->image)
                            <img class="w-full h-56 object-cover" src="data:{{ $post->image_mime }};base64,{{ base64_encode($post->image) }}" alt="{{ $post->title }}">
                        @else
                            <img class="w-full h-56 object-cover" src="{{ url('/images/default-blog.png') }}" alt="{{ $post->title }}">
                        @endif
                    </a>
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
                        <div class="flex items-center text-sm text-blue-600 font-medium space-x-4 mb-4">
                            <span>{{ \Illuminate\Support\Carbon::parse($post->published_at)->format('M j, Y') }}</span>
                            <span>{{ $post->author }}</span>
                        </div>
                        <div class="relative">
                            <p class="text-gray-400 overflow-hidden max-h-24">{{ $post->excerpt }}</p>
                            <div class="absolute inset-x-0 bottom-0 h-8 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center text-gray-500">No posts found.</div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
