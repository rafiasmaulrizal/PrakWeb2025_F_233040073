<x-layout>
  <x-slot:title>{{ $post->title }}</x-slot:title>

  <div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-8">
      
      <!-- Back Button -->
      <a href="/dashboard" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Dashboard</a>
      
      <!-- Post Title -->
      <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
      
      <!-- Post Meta -->
      <div class="text-gray-600 mb-6 flex gap-4">
        <span>Kategori: <span class="font-semibold">{{ $post->category->name }}</span></span>
        <span>|</span>
        <span>Penulis: <span class="font-semibold">{{ $post->author->name }}</span></span>
        <span>|</span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
      </div>

      <!-- Post Image -->
      @if($post->image)
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full rounded-lg mb-6">
      @endif

      <!-- Post Excerpt -->
      <div class="bg-gray-100 p-4 rounded-lg mb-6">
        <p class="text-gray-700 italic">{{ $post->excerpt }}</p>
      </div>

      <!-- Post Body -->
      <div class="prose max-w-none">
        <p class="text-gray-800 whitespace-pre-line">{{ $post->body }}</p>
      </div>

      <!-- Action Buttons -->
      @if(auth()->id() == $post->user_id)
        <div class="mt-8 flex gap-4">
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
            Edit
          </a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">
              Hapus
            </button>
          </form>
        </div>
      @endif

    </div>
  </div>
</x-layout>
