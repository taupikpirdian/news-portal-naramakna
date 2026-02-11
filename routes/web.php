<?php

use Illuminate\Support\Facades\Route;

// home.html
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
// API endpoints for category data (AJAX)
Route::get('/api/v1/categories', [\App\Http\Controllers\HomeController::class, 'getCategories'])->name('api.categories');
Route::get('/api/v1/category/posts', [\App\Http\Controllers\HomeController::class, 'loadCategoryPosts'])->name('api.category.posts');
// API endpoint for fetching category posts with pagination
Route::get('/api/v1/category/{slug}/posts', [\App\Http\Controllers\HomeController::class, 'getCategoryPosts'])->name('api.category.posts.pagination');
Route::get('/api/v1/feed', [\App\Http\Controllers\HomeController::class, 'getFeedPosts'])->name('api.feed');
// index-berita.html
Route::get('/kategori/{slug}', [\App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/index-naramakna', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
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
// Health Check Route
Route::get('/health', function () {
    return response()->json(['status' => 'OK'], 200);
});

// Sitemap Routes
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-pages.xml', [\App\Http\Controllers\SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/sitemap-posts.xml', [\App\Http\Controllers\SitemapController::class, 'posts'])->name('sitemap.posts');
Route::get('/sitemap-categories.xml', [\App\Http\Controllers\SitemapController::class, 'categories'])->name('sitemap.categories');

// Robots.txt Route
Route::get('/robots.txt', function () {
    $content = "User-agent: *\n";
    $content .= "Allow: /\n";
    $content .= "\n";
    $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

    return response($content, 200)->header('Content-Type', 'text/plain');
})->name('robots.txt');

// RSS Feed Route
Route::get('/feed', [\App\Http\Controllers\RssController::class, 'index'])->name('rss.feed');

