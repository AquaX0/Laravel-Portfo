<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Projects
use App\Http\Controllers\ProjectController;
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', function () {
    return view('contact');
});

// Tags
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

// Experience and Skills
Route::get('/experience', [App\Http\Controllers\ExperienceController::class, 'index'])->name('experience.index');
Route::get('/experience/create', [App\Http\Controllers\ExperienceController::class, 'create'])->name('experience.create');
Route::post('/experience', [App\Http\Controllers\ExperienceController::class, 'store'])->name('experience.store');
Route::delete('/experience/{id}', [App\Http\Controllers\ExperienceController::class, 'destroy'])->name('experience.destroy');
Route::get('/experience/{id}/edit', [App\Http\Controllers\ExperienceController::class, 'edit'])->name('experience.edit');
Route::put('/experience/{id}', [App\Http\Controllers\ExperienceController::class, 'update'])->name('experience.update');

Route::get('/skills', [App\Http\Controllers\SkillController::class, 'index'])->name('skills.index');
Route::get('/skills/create', [App\Http\Controllers\SkillController::class, 'create'])->name('skills.create');
Route::post('/skills', [App\Http\Controllers\SkillController::class, 'store'])->name('skills.store');
Route::delete('/skills/{id}', [App\Http\Controllers\SkillController::class, 'destroy'])->name('skills.destroy');
Route::get('/skills/{id}/edit', [App\Http\Controllers\SkillController::class, 'edit'])->name('skills.edit');
Route::put('/skills/{id}', [App\Http\Controllers\SkillController::class, 'update'])->name('skills.update');

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