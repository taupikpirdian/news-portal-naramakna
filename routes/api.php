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

// Google Ads API Routes
// Gunakan API key untuk autentikasi (X-API-Key header)
Route::prefix('google-ads')->name('api.google_ads.')->group(function () {
    // Public endpoint for fetching ad data (no authentication required)
    Route::get('/fetch-ad', [\App\Http\Controllers\GoogleAdsController::class, 'fetchAd'])->name('fetch_ad');

    // Test connection
    Route::get('/test', [\App\Http\Controllers\GoogleAdsController::class, 'testConnection'])->name('test')->middleware('api.key');

    // Customer information
    Route::get('/customer', [\App\Http\Controllers\GoogleAdsController::class, 'getCustomerInfo'])->name('customer')->middleware('api.key');

    // Campaigns
    Route::get('/campaigns', [\App\Http\Controllers\GoogleAdsController::class, 'getCampaigns'])->name('campaigns')->middleware('api.key');
    Route::post('/campaigns', [\App\Http\Controllers\GoogleAdsController::class, 'createCampaign'])->name('create_campaign')->middleware('api.key');
    Route::get('/campaigns/{campaignId}/stats', [\App\Http\Controllers\GoogleAdsController::class, 'getCampaignStats'])->name('campaign_stats')->middleware('api.key');

    // Ad Groups
    Route::get('/campaigns/{campaignId}/ad-groups', [\App\Http\Controllers\GoogleAdsController::class, 'getAdGroups'])->name('ad_groups')->middleware('api.key');
    Route::post('/campaigns/{campaignId}/ad-groups', [\App\Http\Controllers\GoogleAdsController::class, 'createAdGroup'])->name('create_ad_group')->middleware('api.key');

    // Ads
    Route::get('/ad-groups/{adGroupId}/ads', [\App\Http\Controllers\GoogleAdsController::class, 'getAds'])->name('ads')->middleware('api.key');
    Route::post('/ad-groups/{adGroupId}/ads', [\App\Http\Controllers\GoogleAdsController::class, 'createTextAd'])->name('create_ad')->middleware('api.key');

    // Keywords
    Route::get('/ad-groups/{adGroupId}/keywords', [\App\Http\Controllers\GoogleAdsController::class, 'getKeywords'])->name('keywords')->middleware('api.key');
    Route::post('/ad-groups/{adGroupId}/keywords', [\App\Http\Controllers\GoogleAdsController::class, 'createKeyword'])->name('create_keyword')->middleware('api.key');

    // Account summary
    Route::get('/summary', [\App\Http\Controllers\GoogleAdsController::class, 'getAccountSummary'])->name('summary')->middleware('api.key');

    // Sync with Naramakna API
    Route::post('/sync', [\App\Http\Controllers\GoogleAdsController::class, 'syncWithNaramakna'])->name('sync')->middleware('api.key');
});

// Ads Serving Routes
// Public endpoint for serving ads
Route::get('/ads/serve', [\App\Http\Controllers\AdsController::class, 'serve'])->name('api.ads.serve');
