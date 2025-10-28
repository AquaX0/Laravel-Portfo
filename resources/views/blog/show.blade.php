@extends('layouts.app')

@section('title', $post->title . ' - Portfo')

@section('content')
  <div class="max-w-4xl mx-auto px-6 py-12">
    <div class="mb-6">
      <a href="{{ route('blog.index') }}" onclick="event.preventDefault(); window.history.back();" class="inline-flex items-center px-3 py-2 bg-gray-100 rounded hover:bg-gray-200">
        <!-- simple back arrow -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back
      </a>
    </div>
  @if($post->image)
    <div class="mb-8">
      <img src="data:{{ $post->image_mime }};base64,{{ base64_encode($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
  @else
    <div class="mb-8">
      <img src="{{ url('/images/default-blog.png') }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
  @endif

  <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
    <div class="text-sm text-gray-500 mb-6">
      <span>{{ \Illuminate\Support\Carbon::parse($post->published_at)->format('M j, Y') }}</span>
      <span class="mx-2">•</span>
      <span>{{ $post->author }}</span>
    </div>

    <div class="prose max-w-none">
      {!! nl2br(e($post->body)) !!}
    </div>
  </div>
@endsection
