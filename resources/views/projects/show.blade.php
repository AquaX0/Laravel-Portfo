@extends('layouts.app')

@section('title', $project->title . ' - Portfo')

@section('content')
  <div class="max-w-4xl mx-auto px-6 py-12">
    <div class="mb-6">
      <a href="{{ route('projects.index') }}" onclick="event.preventDefault(); window.history.back();" class="inline-flex items-center px-3 py-2 bg-gray-100 rounded hover:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back
      </a>
    </div>
  @if($project->image)
    <div class="mb-8">
      <img src="data:{{ $project->image_mime }};base64,{{ base64_encode($project->image) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
  @else
    <div class="mb-8">
      <img src="{{ url('/images/default-blog.png') }}" alt="{{ $project->title }}" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
  @endif

  <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>
    <div class="text-sm text-gray-500 mb-6">
      <span>{{ \Illuminate\Support\Carbon::parse($project->published_at)->format('M j, Y') }}</span>
    </div>

    @if($project->skills->isNotEmpty())
      <div class="mb-6">
        <h3 class="text-sm font-medium text-gray-700 mb-2">Skills used</h3>
        <div class="flex flex-wrap gap-2">
          @foreach($project->skills as $skill)
            <span class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-700">{{ $skill->name }}</span>
          @endforeach
        </div>
      </div>
    @endif

    @if($project->tags->isNotEmpty())
      <div class="mb-6">
        <h3 class="text-sm font-medium text-gray-700 mb-2">Tags</h3>
        <div class="flex flex-wrap gap-2">
          @foreach($project->tags as $tag)
            <a href="{{ route('tags.show', $tag) }}" class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-700">{{ $tag->name }}</a>
          @endforeach
        </div>
      </div>
    @endif

    <div class="prose max-w-none">
      {!! nl2br(e($project->body)) !!}
    </div>
  </div>
@endsection
