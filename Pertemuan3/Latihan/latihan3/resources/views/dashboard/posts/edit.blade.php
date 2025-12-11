<x-layout>
  <x-slot:title>Edit Post</x-slot:title>

  <div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-8">
      <h2 class="text-2xl font-bold mb-6">Edit Post</h2>

      @if ($errors->has('general'))
        <div class="mb-4 text-sm text-red-700">{{ $errors->first('general') }}</div>
      @endif

      <form action="{{ route('dashboard.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 mb-2">Judul</label>
          <input 
            type="text" 
            name="title" 
            id="title" 
            class="border rounded w-full py-2 px-3 @error('title') border-red-500 @enderror" 
            value="{{ old('title', $post->title) }}"
            required
          >
          @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
          <label for="category_id" class="block text-gray-700 mb-2">Kategori</label>
          <select 
            name="category_id" 
            id="category_id" 
            class="border rounded w-full py-2 px-3 @error('category_id') border-red-500 @enderror"
            required
          >
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Excerpt -->
        <div class="mb-4">
          <label for="excerpt" class="block text-gray-700 mb-2">Excerpt</label>
          <textarea 
            name="excerpt" 
            id="excerpt" 
            rows="3" 
            class="border rounded w-full py-2 px-3 @error('excerpt') border-red-500 @enderror"
            required
          >{{ old('excerpt', $post->excerpt) }}</textarea>
          @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Body -->
        <div class="mb-4">
          <label for="body" class="block text-gray-700 mb-2">Konten</label>
          <textarea 
            name="body" 
            id="body" 
            rows="10" 
            class="border rounded w-full py-2 px-3 @error('body') border-red-500 @enderror"
            required
          >{{ old('body', $post->body) }}</textarea>
          @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Image Upload (optional) -->
        <div class="mb-4">
          <label for="image" class="block text-gray-700 mb-2">Upload Gambar (Optional)</label>
          <input 
            type="file" 
            name="image" 
            id="image" 
            accept="image/*"
            class="border rounded w-full py-2 px-3 @error('image') border-red-500 @enderror"
          >
          @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
          <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF — maks 2MB.</p>

          @if ($post->image)
            <div class="mt-3">
              <p class="text-sm text-gray-700 mb-1">Gambar saat ini:</p>
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-32 h-32 object-cover rounded border">
            </div>
          @endif
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
          <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">
            Simpan Perubahan
          </button>
          <a href="{{ route('dashboard.posts.index') }}" class="bg-gray-300 text-gray-700 py-2 px-6 rounded hover:bg-gray-400">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</x-layout>
