<?php

use Illuminate\Support\Facades\Route;

// home.html
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
// API endpoints for category data (AJAX)
Route::get('/api/categories', [\App\Http\Controllers\HomeController::class, 'getCategories'])->name('api.categories');
Route::get('/api/category/posts', [\App\Http\Controllers\HomeController::class, 'loadCategoryPosts'])->name('api.category.posts');
// API endpoint for fetching category posts with pagination
Route::get('/api/category/{slug}/posts', [\App\Http\Controllers\HomeController::class, 'getCategoryPosts'])->name('api.category.posts.pagination');
Route::get('/api/feed', [\App\Http\Controllers\HomeController::class, 'getFeedPosts'])->name('api.feed');
// index-berita.html
Route::get('/kategori/{slug}', [\App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
// artikel.html
Route::get('/read/{slug}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
// bantu.html
Route::get('/bantuan', [\App\Http\Controllers\HomeController::class, 'bantuan'])->name('bantuan');
// kerja-sa.html
Route::get('/kerja-sama', [\App\Http\Controllers\HomeController::class, 'kerjaSama'])->name('kerjaSama');
// tentang-kami.html
Route::get('/tentang-kami', [\App\Http\Controllers\HomeController::class, 'tentangKami'])->name('tentangKami');
// cara-menulis.html
Route::get('/cara-menulis', [\App\Http\Controllers\HomeController::class, 'caraMenulis'])->name('caraMenulis');
