<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Portfo'))</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white font-sans text-gray-700">
    <div class="relative min-h-screen">
        {{-- Place the page hero first so background/hero layers sit behind the nav --}}
        @yield('hero')

        @include('partials.nav')

        <main class="relative z-0 min-h-screen py-24">
            @yield('content')
        </main>
    </div>
</body>
</html>
