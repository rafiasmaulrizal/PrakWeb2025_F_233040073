<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TobaWeb' }}</title>
    @vite('resources/css/app.css')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
    
</head>

<body class="bg-gray-50">

    <!-- Simple Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                
                <a href="/" class="text-xl font-bold text-gray-800">MyWeb</a>

                <ul class="flex space-x-6 items-center">
                    <li><a href="/" class="text-gray-600 hover:text-blue-600">Home</a></li>
                    <li><a href="/posts" class="text-gray-600 hover:text-blue-600">Posts</a></li>
                    <li><a href="/categories" class="text-gray-600 hover:text-blue-600">Categories</a></li>
                    <li><a href="/about" class="text-gray-600 hover:text-blue-600">About</a></li>
                    
                    @auth
                        <li class="text-gray-600">{{ Auth::user()->name }}</li>
                        <li>
                            <form action="/logout" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-700">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="/login" class="text-blue-600 hover:text-blue-700">Login</a></li>
                        <li><a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</a></li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        {{ $slot }}
    </main>

    <!-- Simple Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p>&copy; {{ date('Y') }} MyWeb. All rights reserved.</p>
    </footer>

</body>
</html>
