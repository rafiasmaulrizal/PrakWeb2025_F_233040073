<x-layout>
  <x-slot:title>Kelola Kategori</x-slot:title>

  <div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg p-8">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Kelola Kategori</h2>
        <a href="{{ route('dashboard.categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium">+ Tambah Kategori</a>
      </div>

      @if (session('success'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded">{{ session('success') }}</div>
      @endif

      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm border-collapse">
          <thead class="bg-gray-100 border-b">
            <tr>
              <th class="px-4 py-3 font-semibold text-gray-700">#</th>
              <th class="px-4 py-3 font-semibold text-gray-700">Nama</th>
              <th class="px-4 py-3 font-semibold text-gray-700">Slug</th>
              <th class="px-4 py-3 font-semibold text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $category)
              <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">{{ $categories->firstItem() + $loop->index }}</td>
                <td class="px-4 py-3 font-medium">{{ $category->name }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $category->slug }}</td>
                <td class="px-4 py-3 flex gap-3">
                  <a href="{{ route('dashboard.categories.edit', $category) }}" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                  <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada kategori</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      @if ($categories->hasPages())
        <div class="mt-6">
          {{ $categories->links() }}
        </div>
      @endif
    </div>
  </div>
</x-layout>
