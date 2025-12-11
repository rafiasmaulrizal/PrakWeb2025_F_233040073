<x-layout>
  <x-slot:title>Dashboard - My Posts</x-slot:title>
  
  <div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">My Posts</h1>
      <a href="{{ route('dashboard.posts.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">
        + Create New Post
      </a>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      <p>{{ session('success') }}</p>
    </div>
    @endif

    {{-- Search Form --}}
    <div class="mb-6">
      <form action="{{ route('dashboard.posts.index') }}" method="GET">
        <div class="flex gap-2">
          <input 
            type="text" 
            name="search" 
            placeholder="Search posts..." 
            value="{{ request('search') }}"
            class="border rounded py-2 px-4 flex-1"
          >
          <button type="submit" class="bg-gray-600 text-white py-2 px-6 rounded hover:bg-gray-700">
            Search
          </button>
        </div>
      </form>
    </div>

    {{-- Posts Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
      @if($posts->count() > 0)
        <table class="w-full">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-left py-3 px-4">No</th>
              <th class="text-left py-3 px-4">Title</th>
              <th class="text-left py-3 px-4">Category</th>
              <th class="text-left py-3 px-4">Created</th>
              <th class="text-left py-3 px-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-3 px-4">{{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}</td>
              <td class="py-3 px-4 font-semibold">{{ $post->title }}</td>
              <td class="py-3 px-4">{{ $post->category->name }}</td>
              <td class="py-3 px-4 text-sm text-gray-600">{{ $post->created_at->format('d M Y') }}</td>
              <td class="py-3 px-4">
                <div class="flex gap-2">
                  <a href="{{ route('dashboard.posts.show', $post->slug) }}" class="text-blue-600 hover:underline text-sm">View</a>
                  <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="text-yellow-600 hover:underline text-sm">Edit</a>
                  <form action="{{ route('dashboard.posts.destroy', $post->slug) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        {{-- Pagination --}}
        <div class="p-4">
          {{ $posts->links() }}
        </div>
      @else
        <div class="p-8 text-center text-gray-600">
          <p class="text-lg mb-4">No posts found.</p>
          <a href="{{ route('dashboard.posts.create') }}" class="text-blue-600 hover:underline">Create your first post</a>
        </div>
      @endif
    </div>
  </div>
</x-layout>
