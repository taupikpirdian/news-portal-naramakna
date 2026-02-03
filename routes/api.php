<?php

use Illuminate\Support\Facades\Route;

// Cache Management API Routes
// Gunakan API key untuk autentikasi (X-API-Key header)
Route::prefix('admin/cache')->name('api.admin.cache.')->group(function () {
    Route::get('/stats', [\App\Http\Controllers\CacheManagementController::class, 'getStats'])->name('stats');
    Route::post('/clear/all', [\App\Http\Controllers\CacheManagementController::class, 'clearAll'])->name('clear.all')->middleware('api.key');
    Route::post('/clear/categories', [\App\Http\Controllers\CacheManagementController::class, 'clearCategories'])->name('clear.categories')->middleware('api.key');
    Route::post('/clear/category', [\App\Http\Controllers\CacheManagementController::class, 'clearCategory'])->name('clear.category')->middleware('api.key');
    Route::post('/clear/post', [\App\Http\Controllers\CacheManagementController::class, 'clearPost'])->name('clear.post')->middleware('api.key');
    Route::post('/clear/feed', [\App\Http\Controllers\CacheManagementController::class, 'clearFeed'])->name('clear.feed')->middleware('api.key');
});
