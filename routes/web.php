<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('project.index');
Route::redirect('/tags', '/');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('project.tags');

Route::get('/wall', [BlogController::class, 'wall'])->name('blog.index');
Route::redirect('/category', '/wall');
Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category.show');
Route::get('/post/{slug}', [BlogController::class, 'post'])->name('blog.post.show');

Route::get('/text-editor', [HomeController::class, 'textEditor'])->name('feature.editor');

Route::get('/latest-images', [HomeController::class, 'latestImages'])->name('feature.latest-images');
