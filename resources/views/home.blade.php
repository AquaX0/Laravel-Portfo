@extends('layouts.app')

@section('title', 'Home - Portfo')

@section('hero')
    <div class="absolute inset-0 z-10 flex items-center justify-center">
        <div class="text-center px-6">
            <img src="{{ url('/images/author-image.jpg') }}" alt="avatar" class="mx-auto w-50 h-50 rounded-full object-cover border-4 border-white shadow-lg">
            <h1 class="mt-6 text-6xl md:text-7xl font-extrabold text-white leading-tight">Britney Glory Chen</h1>
            <p class="mt-6 text-3xl font-bold text-white">I'm a <a href="#" class="text-blue-300 underline decoration-blue-300">Programmer</a>.</p>
        </div>
    </div>
@endsection

@section('content')
    {{-- keep the split background and image markup for the home page layout --}}
    <div class="absolute inset-0">
        <div class="absolute inset-0 flex">
            <div class="w-1/2 bg-indigo-50"></div>
            <div class="w-1/2 bg-white"></div>
        </div>
    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1800&auto=format&fit=crop&ixlib=rb-4.0.3" class="w-full h-full object-cover object-center filter brightness-95" alt="coding">
    {{-- subtle dark overlay so text remains readable but image still shows through --}}
    <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 flex">
            <div class="w-1/2 bg-indigo-50/30"></div>
            <div class="w-1/2 bg-white/0"></div>
        </div>
    </div>
@endsection