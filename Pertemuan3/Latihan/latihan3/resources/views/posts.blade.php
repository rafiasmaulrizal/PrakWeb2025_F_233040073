<x-layout>

    <div class="bg-gray-50 min-h-screen pb-16">

        <div class="container mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-4">Daftar Posts</h1>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($posts as $post)
                    <article class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 border border-gray-100 flex flex-col">

                        <h2 class="text-xl font-semibold mb-2">
                            <a href="/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-sm text-gray-500 mb-3">
                            By 
                            <span class="font-medium text-gray-700">{{ $post->author->name }}</span>
                            • Category:
                            <span class="text-gray-700 font-medium">{{ $post->category->name }}</span>
                        </p>

                        <p class="text-gray-600 mb-4 flex-grow">
                            {{ $post->excerpt }}
                        </p>

                        <a href="/posts/{{ $post->slug }}"
                           class="inline-block text-blue-600 hover:text-blue-800 font-medium">
                           Baca Selengkapnya →
                        </a>

                    </article>
                @endforeach

            </div>

        </div>

    </div>

</x-layout>
