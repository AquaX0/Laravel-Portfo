@extends('layouts.app')

@section('title', 'About - Portfo')

@section('content')
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <!-- Left: About -->
            <div class="space-y-6">
                <img src="{{ url('/images/author-image.jpg') }}" alt="avatar" class="w-40 h-40 rounded-full object-cover border-4 border-gray-100 shadow-lg mx-auto md:mx-0">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">About Me</h1>
                <p class="text-lg text-gray-600">
                    My name is Britney Glory Chen, I'm a student at Universitas Ciputra Makassar. Right now, I'm in my second semester in Full Stack Development major. I am currently learning VisPro (visual Programming) using flutter and how to make a php website with laravel.
                </p>
            </div>

            <!-- Right: Skills and Education stacked -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Education</h3>
                    <ul class="text-gray-700 space-y-4">
                        <li>
                            <strong>Universitas Ciputra Makassar</strong>
                            <div>Full Stack Development, 2nd Semester (2024 - Present)</div>
                        </li>
                        <li>
                            <strong>SMA Katolik Rajawali</strong>
                            <div>Student, Graduated (2020 - 2024)</div>
                        </li>
                        <li>
                            <strong>SMP Katolik Rajawali</strong>
                            <div>Student, Graduated (2018 - 2020)</div>
                        </li>
                        <li>
                            <strong>SD Zion</strong>
                            <div>Student, Graduated (2012 - 2018)</div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Skills</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        <li>HTML</li>
                        <li>Dart</li>
                        <li>Python</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
