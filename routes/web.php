<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', function () {
    return view('contact');
});

// Serve author image from resources/images without copying to public/
Route::get('/images/author-image.jpg', function () {
    $path = resource_path('images/author-image.jpg');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, [
        'Content-Type' => 'image/jpeg'
    ]);
});

// Serve default blog image from resources/images
Route::get('/images/default-blog.png', function () {
    $path = resource_path('images/default-blog.png');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, [
        'Content-Type' => 'image/png'
    ]);
});