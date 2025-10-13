<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Blog - Portfo</title>
	@vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-white font-sans text-gray-700">
	<div class="relative min-h-screen">

		<!-- Top navigation (same as about) -->
		<header class="relative z-20">
			<div class="max-w-7xl mx-auto px-6 py-6">
				<div class="relative">
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

		<!-- Blog header + cards -->
		<main class="relative z-10 py-24">
			<div class="max-w-6xl mx-auto px-6">
				<div class="mb-12 text-center">
					<h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">My Blog</h1>
					<p class="mt-3 text-gray-600">Latest articles, tutorials and news</p>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
					<!-- Post card 1 -->
					<article class="bg-white">
						<a href="#" class="block overflow-hidden rounded-xl">
							<img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1400&q=80" alt="Coding workspace" class="w-full h-56 object-cover">
						</a>
						<div class="p-6">
							<h2 class="text-2xl font-semibold mb-4">Why Lead Generation is Key for Business Growth</h2>
							<div class="flex items-center text-sm text-blue-600 font-medium space-x-4 mb-4">
								<span>Sept. 12, 2019</span>
								<span>Admin</span>
								<span class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 16 16"><path d="M2 2h12v9H9l-3 3v-3H2V2z"/></svg>3</span>
							</div>
							<p class="text-gray-400">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						</div>
					</article>

					<!-- Post card 2 -->
					<article class="bg-white">
						<a href="#" class="block overflow-hidden rounded-xl">
							<img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.0.3&s=0" alt="Laptop mockup" class="w-full h-56 object-cover">
						</a>
						<div class="p-6">
							<h2 class="text-2xl font-semibold mb-4">Why Lead Generation is Key for Business Growth</h2>
							<div class="flex items-center text-sm text-blue-600 font-medium space-x-4 mb-4">
								<span>Sept. 12, 2019</span>
								<span>Admin</span>
								<span class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 16 16"><path d="M2 2h12v9H9l-3 3v-3H2V2z"/></svg>3</span>
							</div>
							<p class="text-gray-400">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						</div>
					</article>

					<!-- Post card 3 -->
					<article class="bg-white">
						<a href="#" class="block overflow-hidden rounded-xl">
							<img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?q=80&w=1400&auto=format&fit=crop&ixlib=rb-4.0.3&s=0" alt="Workspace" class="w-full h-56 object-cover">
						</a>
						<div class="p-6">
							<h2 class="text-2xl font-semibold mb-4">Why Lead Generation is Key for Business Growth</h2>
							<div class="flex items-center text-sm text-blue-600 font-medium space-x-4 mb-4">
								<span>Sept. 12, 2019</span>
								<span>Admin</span>
								<span class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 16 16"><path d="M2 2h12v9H9l-3 3v-3H2V2z"/></svg>3</span>
							</div>
							<p class="text-gray-400">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						</div>
					</article>
				</div>
			</div>
		</main>
	</div>
</body>
</html>

