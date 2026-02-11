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
    | Google Ads Data Source
    |--------------------------------------------------------------------------
    |
    | Sumber data iklan: 'api' untuk ambil dari Google Ads API,
    | 'static' untuk menggunakan kode ad unit statis
    |
    */

    'data_source' => env('ADS_DATA_SOURCE', 'static'), // 'api' or 'static'

    /*
    |--------------------------------------------------------------------------
    | Google Ad Unit Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi Ad Unit Google AdSense untuk tampilan statis
    |
    */

    'ad_units' => [
        'leaderboard' => [
            'enabled' => env('ADS_LEADERBOARD_ENABLED', true),
            'slot' => env('ADS_LEADERBOARD_SLOT', '1234567890'),
            'format' => 'horizontal',
            'responsive' => true,
        ],
        'sidebar_left' => [
            'enabled' => env('ADS_SIDEBAR_LEFT_ENABLED', false),
            'slot' => env('ADS_SIDEBAR_LEFT_SLOT', '1234567891'),
            'format' => 'vertical',
            'responsive' => false,
        ],
        'sidebar_right' => [
            'enabled' => env('ADS_SIDEBAR_RIGHT_ENABLED', false),
            'slot' => env('ADS_SIDEBAR_RIGHT_SLOT', '1234567892'),
            'format' => 'vertical',
            'responsive' => false,
        ],
        'in_article' => [
            'enabled' => env('ADS_IN_ARTICLE_ENABLED', true),
            'slot' => env('ADS_IN_ARTICLE_SLOT', '1234567893'),
            'format' => 'article',
            'responsive' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google Adsense Publisher ID
    |--------------------------------------------------------------------------
    |
    | Google AdSense Publisher ID (ca-pub-XXXXXXXXXXXXXXXX)
    |
    */

    'adsense_publisher_id' => env('ADSENSE_PUBLISHER_ID', 'ca-pub-XXXXXXXXXXXXXXXX'),

    /*
    |--------------------------------------------------------------------------
    | Test Mode
    |--------------------------------------------------------------------------
    |
    | Aktifkan test mode untuk menampilkan iklan test/dev
    |
    */

    'test_mode' => env('ADS_TEST_MODE', true),

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi cache untuk data iklan dari API
    |
    */

    'cache' => [
        'enabled' => env('ADS_CACHE_ENABLED', true),
        'ttl' => env('ADS_CACHE_TTL', 3600), // 1 hour
    ],

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
