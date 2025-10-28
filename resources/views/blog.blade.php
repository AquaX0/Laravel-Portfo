@extends('layouts.app')

@section('title', 'My Blog - Portfo')

@section('content')
	<div class="max-w-6xl mx-auto px-6">
		<div class="mb-12 text-center">
			<h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">My Blog</h1>
			<p class="mt-3 text-gray-600">Latest articles, tutorials and news</p>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
			@forelse($posts ?? [] as $post)
				<article class="bg-white rounded-xl overflow-hidden shadow-sm">
					@if(isset($post->excerpt))
						<div class="h-56 bg-gray-100 flex items-center justify-center">
							<span class="text-gray-400">Image placeholder</span>
						</div>
					@endif
					<div class="p-6">
						<h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
						<div class="flex items-center text-sm text-blue-600 font-medium space-x-4 mb-4">
							<span>{{ \Illuminate\Support\Carbon::parse($post->published_at)->format('M j, Y') }}</span>
							<span>{{ $post->author }}</span>
						</div>
						<p class="text-gray-400">{{ $post->excerpt }}</p>
					</div>
				</article>
			@empty
				<div class="col-span-full text-center text-gray-500">No posts found.</div>
			@endforelse
		</div>
	</div>
@endsection

