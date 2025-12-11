<x-layout>
  <x-slot:title>Dashboard</x-slot:title>
  
  <div class="max-w-6xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Dashboard - Selamat datang, {{ auth()->user()->name }}!</h1>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- Button Tambah Post dan Kategori -->
    <div class="mb-6 flex gap-4">
      <a href="{{ route('dashboard.posts.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 inline-block font-medium">
        + Tambah Postingan Baru
      </a>
      <a href="{{ route('dashboard.categories.index') }}" class="bg-green-600 text-white py-2 px-6 rounded hover:bg-green-700 inline-block font-medium">
        Kelola Kategori
      </a>
    </div>

    <!-- List Posts -->
    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-2xl font-bold mb-4">Postingan Saya</h2>
      
      @if(isset($posts) && $posts->count() > 0)
        <table class="w-full">
          <thead>
            <tr class="border-b">
              <th class="text-left py-2">No</th>
              <th class="text-left py-2">Judul</th>
              <th class="text-left py-2">Kategori</th>
              <th class="text-left py-2">Tanggal</th>
              <th class="text-left py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-2">{{ $loop->iteration }}</td>
              <td class="py-2">{{ $post->title }}</td>
              <td class="py-2">{{ $post->category->name }}</td>
              <td class="py-2">{{ $post->created_at->format('d M Y') }}</td>
              <td class="py-2">
                <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">Lihat</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p class="text-gray-600">Belum ada postingan. Silakan buat postingan pertama Anda!</p>
      @endif
    </div>
  </div>
</x-layout>