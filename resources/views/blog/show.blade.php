@extends('layouts.app')

@section('title', $post->title . ' - Portfo')

@section('content')
  <div class="max-w-4xl mx-auto px-6 py-12">
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
