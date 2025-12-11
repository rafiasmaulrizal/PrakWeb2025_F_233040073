@props(['categories'])

{{-- Form Body --}}
<form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid sm:grid-cols-2 gap-4">
        {{-- Title --}}
        <div class="sm:col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="bg-neutral-secondary-medium border @error('title') border-red-500 @else border-default-medium @enderror text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter post title" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="sm:col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
            <select name="category_id" id="category_id"
                class="block w-full p-2.5 bg-neutral-secondary-medium border @error('category_id') border-red-500 @else border-default-medium @enderror text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                <option value="">Select an option (Is Category)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div class="sm:col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block w-full p-2.5 text-sm bg-neutral-secondary-medium border @error('excerpt') border-red-500 @else border-default-medium @enderror rounded-base focus:border-brand focus:ring-brand w-full p-2.5 shadow-xs placeholder:text-body"
                placeholder="Write a short excerpt or summary">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="sm:col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Content</label>
            <textarea name="body" id="body" rows="8"
                class="block w-full p-2.5 bg-neutral-secondary-medium border @error('body') border-red-500 @else border-default-medium @enderror text-heading text-sm rounded-base focus:ring-brand focus:border-brand w-full p-2.5 shadow-xs placeholder:text-body"
                placeholder="Write your post content here">{{ old('body') }}</textarea>
            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Upload --}}
        <div class="sm:col-span-2">
            <label class="block mb-2.5 text-sm font-medium text-heading" for="image">Upload Image</label>
            <input 
                class="block w-full text-sm text-gray-900 border @error('image') border-red-500 @else border-default-medium @enderror rounded-base cursor-pointer bg-neutral-secondary-medium focus:outline-none focus:ring-brand focus:border-brand p-2.5" 
                aria-describedby="image_help" 
                id="image" 
                name="image" 
                type="file"
                accept="image/*">
            <p class="mt-1 text-sm text-gray-500" id="image_help">PNG, JPG, JPEG, or GIF (MAX. 2MB).</p>
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Form Footer --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
        <button type="submit"
            class="inline-flex items-center justify-center text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-text-xs px-4 py-2.5 focus:outline-none">
            Create Post
        </button>
        <a href="{{ route('dashboard.index') }}"
            class="text-body bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium focus:ring-4 focus:ring-neutral-tertiary-medium shadow-xs font-medium leading-5 rounded-text-xs px-4 py-2.5 focus:outline-none">
            Cancel
        </a>
    </div>
</form>