<x-layout>
    <x-slot:title>Categories</x-slot:title>

           
    <h1>Halaman Categories</h1>
    <p>Selamat datang di halaman categories.</p>
    
    <div>
        @foreach ($categories as $category)
            <article>
                <h3>
                 <a href="/categories/{{ $category->slug }}">
                    {{ $category->name }}
                </h3>
            </article>
        @endforeach
    </div>
</x-layout>
