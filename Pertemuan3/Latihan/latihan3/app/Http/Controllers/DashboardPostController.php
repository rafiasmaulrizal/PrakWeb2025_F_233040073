<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id);

        //fitur search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        //menampilkan 5 data perhalaman
        return view('dashboard.posts.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'excerpt' => 'required',
                'body' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'title.required' => 'Field Title wajib diisi',
                'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
                'category_id.required' => 'Field Category wajib dipilih',
                'category_id.exists' => 'Category yang dipilih tidak valid',
                'excerpt.required' => 'Field Excerpt wajib diisi',
                'body.required' => 'Field Content wajib diisi',
                'image.image' => 'File harus berupa gambar',
                'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
                'image.max' => 'Ukuran gambar maksimal 2MB',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        try {
            return DB::transaction(function () use ($request, $validated) {
                $slug = Str::slug($request->title, '-');

                $originalSlug = $slug;
                $count = 1;
                while (Post::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }

                $imagePath = null;
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('posts', 'public');
                }

                $post = Post::create([
                    'title' => $validated['title'],
                    'slug' => $slug,
                    'category_id' => $validated['category_id'],
                    'excerpt' => $validated['excerpt'],
                    'body' => $validated['body'],
                    'image' => $imagePath,
                    'user_id' => Auth::user()->id
                ]);

                return redirect()->route('dashboard.posts.index')->with('success', 'Post created successfully.');
            });
        } catch (\Throwable $e) {
            // If file uploaded but DB failed, remove the file
            if (isset($imagePath) && $imagePath) {
                try {
                    Storage::disk('public')->delete($imagePath);
                } catch (\Throwable $delErr) {
                    Log::warning('Failed to cleanup uploaded image after store failure', [
                        'path' => $imagePath,
                        'error' => $delErr->getMessage(),
                    ]);
                }
            }

            Log::error('Failed to create post', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['general' => 'Terjadi kesalahan saat menyimpan post. Coba lagi.'])
                ->withInput();
        }
    }

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ])->validate();

        $slug = Str::slug($request->title, '-');

        if ($slug !== $post->slug) {
            $originalSlug = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
        } else {
            $slug = $post->slug;
        }

        // handle image replacement
        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('posts', 'public');
            // delete old image if exists
            if ($imagePath) {
                try {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($imagePath);
                } catch (\Throwable $e) {
                }
            }
            $imagePath = $newPath;
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'image' => $imagePath
        ]);

        return redirect()->route('dashboard.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // delete image file if present
        if ($post->image) {
            try {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
            } catch (\Throwable $e) {
            }
        }
        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post deleted successfully.');
    }
}
