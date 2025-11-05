@extends('layouts.app')

@section('title', $tag->name . ' - Tag - Portfo')

@section('content')
  <div class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-4">Tag: {{ $tag->name }}</h1>

    <section class="mb-8">
      <h2 class="text-2xl font-semibold mb-3">Posts</h2>
      @if($posts->isEmpty())
        <div class="text-gray-500">No posts for this tag.</div>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($posts as $post)
            <article class="bg-white rounded p-4 shadow-sm">
              <h3 class="font-semibold text-lg"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
              <div class="text-sm text-gray-500">{{ \Illuminate\Support\Carbon::parse($post->published_at)->format('M j, Y') }}</div>
            </article>
          @endforeach
        </div>
        <div class="mt-6">{{ $posts->links() }}</div>
      @endif
    </section>

    <section>
      <h2 class="text-2xl font-semibold mb-3">Projects</h2>
      @if($projects->isEmpty())
        <div class="text-gray-500">No projects for this tag.</div>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($projects as $project)
            <article class="bg-white rounded-lg overflow-hidden shadow-sm">
              <a href="{{ route('projects.show', $project) }}" class="block h-40 bg-gray-100 overflow-hidden">
                @if($project->image)
                  <img class="w-full h-40 object-cover" src="data:{{ $project->image_mime }};base64,{{ base64_encode($project->image) }}" alt="{{ $project->title }}">
                @else
                  <img class="w-full h-40 object-cover" src="{{ url('/images/default-blog.png') }}" alt="{{ $project->title }}">
                @endif
              </a>
              <div class="p-4">
                <h3 class="font-semibold text-lg">{{ $project->title }}</h3>
                <div class="text-sm text-gray-500">{{ \Illuminate\Support\Carbon::parse($project->published_at)->format('M j, Y') }}</div>
              </div>
            </article>
          @endforeach
        </div>
      @endif
    </section>
  </div>
@endsection
