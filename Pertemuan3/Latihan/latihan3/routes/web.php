<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

// Dashboard Categories CRUD
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
});

//route posts dengan protect auth - harus login dulu
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

//route model binding
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

//route untuk register middleware guest
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//route untuk login middleware guest
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

//route logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

//route dashboard posts
Route::get('/dashboard/posts', [DashboardPostController::class, 'index'])->middleware('auth')->name('dashboard.posts.index');
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware('auth')->name('dashboard.posts.create');
Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->middleware('auth')->name('dashboard.posts.store');
Route::get('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth')->name('dashboard.posts.show');
Route::get('/dashboard/posts/{post:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('auth')->name('dashboard.posts.edit');
Route::put('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'update'])->middleware('auth')->name('dashboard.posts.update');
Route::delete('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'destroy'])->middleware('auth')->name('dashboard.posts.destroy');
