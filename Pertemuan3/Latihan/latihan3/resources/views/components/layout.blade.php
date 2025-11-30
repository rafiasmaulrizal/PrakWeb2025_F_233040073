<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>{{ $title ?? 'Tobaweb' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col">

    <nav class="backdrop-blur-md bg-white/70 border-b border-gray-200 fixed w-full z-50">
    <div class="container mx-auto flex items-center justify-between px-6 py-3">

        <a href="/" class="text-2xl font-semibold text-gray-800 tracking-wide">
            Toba<span class="text-blue-600">Web</span>
        </a>

        <ul class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <li><a href="/" class="hover:text-blue-600 transition">Home</a></li>
            <li><a href="/posts" class="hover:text-blue-600 transition">Posts</a></li>
            <li><a href="/categories" class="hover:text-blue-600 transition">Categories</a></li>
            <li><a href="/about" class="hover:text-blue-600 transition">About</a></li>
            <li><a href="/blog" class="hover:text-blue-600 transition">Blog</a></li>
            <li><a href="/contact" class="hover:text-blue-600 transition">Contact</a></li>
        </ul>

    </div>
</nav>


    <main class="flex-grow pt-20">
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 text-gray-300">
        <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <h3 class="text-2xl font-bold text-white">TobaWeb</h3>
                <p class="text-gray-400 mt-3 leading-relaxed">
                    Bersama kami membangun masa depan yang lebih gemilang dan berkelanjutan, karena kami sangat terbuka untuk inovasi dan bisnis, apalagi dibidang web developer.
                </p>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-3">Menu</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/about" class="hover:text-white">About</a></li>
                    <li><a href="/posts" class="hover:text-white">Posts</a></li>
                    <li><a href="/blog" class="hover:text-white">Blog</a></li>
                    <li><a href="/contact" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold text-white mb-3">Kontak</h4>
                <p class="text-gray-400">Email: support@tobaweb.com</p>
                <p class="text-gray-400 mt-1">Instagram: @tobaweb</p>
            </div>

        </div>

        <div class="bg-gray-800 text-center py-4 text-sm text-gray-400">
            © {{ date('Y') }} TobaWeb. All rights reserved.
        </div>
    </footer>

</body>
</html>
