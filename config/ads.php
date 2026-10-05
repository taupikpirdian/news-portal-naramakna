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
    | Konfigurasi Ad Unit Google AdSense untuk menampilkan iklan
    |
    | Untuk membuat ad unit:
    | 1. Login ke https://adsense.google.com
    | 2. Buka Ads > By ad unit
    | 3. Klik "Create ad unit"
    | 4. Pilih jenis iklan (Display, In-article, dll)
    | 5. Copy data-ad-slot dari generated code
    |
    | Contoh Ad Unit Slot ID: 1234567890 (16 digit angka)
    |
    */

    'ad_units' => [
        // Homepage Placements (Sama dengan naramakna.id/frontend)
        'article' => [
            'enabled' => env('ADS_IN_ARTICLE_ENABLED', true),
            'slot' => env('ADS_IN_ARTICLE_SLOT', ''),
            'format' => 'article',
            'responsive' => true,
        ],
        'leaderboard' => [
            'enabled' => env('ADS_LEADERBOARD_ENABLED', true),
            'slot' => env('ADS_LEADERBOARD_SLOT', ''),
            'format' => 'horizontal',
            'responsive' => true,
        ],
        'header' => [
            'enabled' => env('ADS_HEADER_ENABLED', true),
            'slot' => env('ADS_HEADER_SLOT', ''),
            'format' => 'horizontal',
            'responsive' => true,
        ],
        'mid' => [
            'enabled' => env('ADS_MID_ENABLED', true),
            'slot' => env('ADS_MID_SLOT', ''),
            'format' => 'auto',
            'responsive' => true,
        ],
        'bottom' => [
            'enabled' => env('ADS_BOTTOM_ENABLED', true),
            'slot' => env('ADS_BOTTOM_SLOT', ''),
            'format' => 'horizontal',
            'responsive' => true,
        ],

        // Sidebar Placements
        'sidebar_left' => [
            'enabled' => env('ADS_SIDEBAR_LEFT_ENABLED', true),
            'slot' => env('ADS_SIDEBAR_LEFT_SLOT', ''),
            'format' => 'vertical',
            'responsive' => false,
        ],
        'sidebar_right' => [
            'enabled' => env('ADS_SIDEBAR_RIGHT_ENABLED', true),
            'slot' => env('ADS_SIDEBAR_RIGHT_SLOT', ''),
            'format' => 'vertical',
            'responsive' => false,
        ],

        // Content Placements
        'regular' => [
            'enabled' => env('ADS_REGULAR_ENABLED', true),
            'slot' => env('ADS_REGULAR_SLOT', ''),
            'format' => 'auto',
            'responsive' => true,
        ],

        // Article Placements
        'in_article' => [
            'enabled' => env('ADS_IN_ARTICLE_ENABLED', true),
            'slot' => env('ADS_IN_ARTICLE_SLOT', ''),
            'format' => 'article',
            'responsive' => true,
        ],
        'article_mid' => [
            'enabled' => env('ADS_ARTICLE_MID_ENABLED', true),
            'slot' => env('ADS_ARTICLE_MID_SLOT', ''),
            'format' => 'article',
            'responsive' => true,
        ],
        'article_bottom' => [
            'enabled' => env('ADS_ARTICLE_BOTTOM_ENABLED', true),
            'slot' => env('ADS_ARTICLE_BOTTOM_SLOT', ''),
            'format' => 'article',
            'responsive' => true,
        ],
        'article_final' => [
            'enabled' => env('ADS_ARTICLE_FINAL_ENABLED', true),
            'slot' => env('ADS_ARTICLE_FINAL_SLOT', ''),
            'format' => 'article',
            'responsive' => true,
        ],
        'content' => [
            'enabled' => env('ADS_CONTENT_ENABLED', true),
            'slot' => env('ADS_CONTENT_SLOT', ''),
            'format' => 'auto',
            'responsive' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google AdSense Publisher ID
    |--------------------------------------------------------------------------
    |
    | Google AdSense Publisher ID untuk menampilkan iklan
    |
    | Format: ca-pub-XXXXXXXXXXXXXXXX
    |
    | Cara mendapatkan:
    | 1. Login ke https://adsense.google.com
    | 2. Buka Settings > Account information
    | 3. Copy Publisher ID yang ada di sana
    |
    | CATATAN: Ini berbeda dengan Google Ads Customer ID!
    | - AdSense Publisher ID: ca-pub-XXXXXXXXXXXXXXXX (untuk menampilkan iklan)
    | - Google Ads Customer ID: 123-456-7890 (untuk manage campaign)
    |
    */

    'adsense_publisher_id' => env('ADSENSE_PUBLISHER_ID', 'ca-pub-XXXXXXXXXXXXXXXX'),

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

    /*
    |--------------------------------------------------------------------------
    | External Ads API Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk mengambil data iklan dari external API
    |
    */

    'external_api_url' => env('NARAMAKNA_API_BASE_URL', 'https://api.naramakna.id'),
];
