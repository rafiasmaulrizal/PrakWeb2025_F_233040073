<x-layout>
    <x-slot:title>Categories</x-slot:title>

    <div class="min-h-screen bg-gray-100 p-10">
        <h1 class="text-3xl font-bold mb-4">Daftar Category</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <a href="#" class="block bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h2>
                    <p class="text-gray-600 mt-2">
                        Jumlah Post: {{ $category->posts->count() }}
                    </p>
                </a>
            @endforeach
        </div>
    </div>

</x-layout>
