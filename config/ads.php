<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Ads Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk mengaktifkan/menonaktifkan iklan Google Ads
    | di seluruh aplikasi.
    |
    */

    'enabled' => env('ADS_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Instagram Feed Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk mengaktifkan/menonaktifkan fitur Instagram Feed
    | di halaman home.
    |
    */

    'instagram_feed_enabled' => env('INSTAGRAM_FEED_ENABLED', true),
];
