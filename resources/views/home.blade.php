<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Portfo</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white font-sans text-gray-700">
    <div class="relative min-h-screen overflow-hidden">
        <!-- Split background: left pale, right white -->
        <div class="absolute inset-0 flex">
            <div class="w-1/2 bg-indigo-50"></div>
            <div class="w-1/2 bg-white"></div>
        </div>
            <!-- Background image (same as About page) + split color behind for design -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1800&auto=format&fit=crop&ixlib=rb-4.0.3" class="w-full h-full object-cover object-center" alt="coding">
                <div class="absolute inset-0 bg-black opacity-30 mix-blend-multiply"></div>
                <div class="absolute inset-0 flex">
                    <div class="w-1/2 bg-indigo-50/30"></div>
                    <div class="w-1/2 bg-white/0"></div>
                </div>
            </div>

        <!-- Top navigation -->
        <header class="relative z-20">
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="relative">

                    <!-- centered nav -->
                    <nav class="flex justify-center">
                        <ul class="flex space-x-10 text-sm font-medium items-center">
                            <li><a href="/" class="text-gray-700">Home</a></li>
                            <li><a href="/about" class="text-gray-700">About</a></li>
                            <li><a href="/blog" class="text-gray-700">My Blog</a></li>
                            <li><a href="/contact" class="text-gray-700">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

    <!-- Hero content centered (fills viewport so content is perfectly centered) -->
    <main class="absolute inset-0 z-10 flex items-center justify-center">
            <div class="text-center px-6">
                    <img src="{{ url('/images/author-image.jpg') }}" alt="avatar" class="mx-auto w-50 h-50 rounded-full object-cover border-4 border-white shadow-lg">
                    <h1 class="mt-6 text-6xl md:text-7xl font-extrabold text-white leading-tight">Britney Glory Chen</h1>
                    <p class="mt-6 text-3xl font-bold text-white">I'm a <a href="#" class="text-blue-300 underline decoration-blue-300">Programmer</a>.</p>
            </div>
        </main>
    </div>
</body>
</html>
