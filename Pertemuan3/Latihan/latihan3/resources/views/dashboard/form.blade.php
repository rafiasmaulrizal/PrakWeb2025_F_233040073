@props(['categories'])

{{-- Form Body --}}
<form action="{{ route('dashboard.store') }}" method="POST">
    @csrf
    <div class="grid sm:grid-cols-2 gap-4">
        {{-- Title --}}
        <div class="sm:col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter post title" required>
        </div>

        {{-- Category --}}
        <div class="sm:col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
            <select name="category_id" id="category_id"
                class="block w-full p-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                <option value="">Select an option (Is Category)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Excerpt --}}
        <div class="sm:col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block w-full p-2.5 text-sm bg-neutral-secondary-medium border border-default-medium rounded-base focus:border-brand focus:ring-brand w-full p-2.5 shadow-xs placeholder:text-body"
                placeholder="Write a short excerpt or summary">{{ old('excerpt') }}</textarea>
        </div>

        {{-- Body --}}
        <div class="sm:col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Content</label>
            <textarea name="body" id="body" rows="8"
                class="block w-full p-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand w-full p-2.5 shadow-xs placeholder:text-body"
                placeholder="Write your post content here">{{ old('body') }}</textarea>
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