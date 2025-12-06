<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// ruteu tugas
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard.index');

//create form post baru
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware('auth', 'verified')->name('dashboard.create');

//menyimpan data post baru
Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->middleware('auth', 'verified')->name('dashboard.store');

//menampil data post berdasarkan slug
Route::get('/dashboard/posts/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth', 'verified')->name('dashboard.show');