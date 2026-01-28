<?php

use Illuminate\Support\Facades\Route;

// home.html
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
// index-berita.html
Route::get('/index', [\App\Http\Controllers\HomeController::class, 'index']);
// artikel.html
Route::get('/detail', [\App\Http\Controllers\HomeController::class, 'detail']);
// bantu.html
Route::get('/bantuan', [\App\Http\Controllers\HomeController::class, 'bantuan']);
// kerja-sa.html
Route::get('/kerja-sama', [\App\Http\Controllers\HomeController::class, 'kerjaSama']);
// tentang-kami.html
Route::get('/tentang-kami', [\App\Http\Controllers\HomeController::class, 'tentangKami']);
