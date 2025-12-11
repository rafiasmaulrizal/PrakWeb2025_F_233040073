<x-layout>
  <x-slot:title>Create Category</x-slot:title>

  <div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-8">
      <h2 class="text-2xl font-bold mb-6">Buat Kategori Baru</h2>

      <form method="POST" action="{{ route('dashboard.categories.store') }}" class="space-y-4">
        @csrf
        <div>
          <label for="name" class="block text-gray-700 mb-2">Nama Kategori</label>
          <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded px-3 py-2" required>
          @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
          <label for="slug" class="block text-gray-700 mb-2">Slug (opsional)</label>
          <input id="slug" name="slug" type="text" value="{{ old('slug') }}" class="w-full border @error('slug') border-red-500 @else border-gray-300 @enderror rounded px-3 py-2">
          @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2 flex gap-4">
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
          <a href="{{ route('dashboard.categories.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
        </div>
      </form>
    </div>
  </div>
</x-layout>
