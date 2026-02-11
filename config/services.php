<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'naramakna' => [
        'base_url' => env('NARAMAKNA_API_BASE_URL', 'https://api.naramakna.id'),
        'cache_ttl' => env('NARAMAKNA_CACHE_TTL', 3600), // 1 hour in seconds
    ],

    'google_ads' => [
        'customer_id' => env('GOOGLE_ADS_CUSTOMER_ID'),
        'customer_id_alt' => env('GOOGLE_ADS_CUSTOMER_ID_ALT'),
        'client_id' => env('GOOGLE_ADS_CLIENT_ID'),
        'client_secret' => env('GOOGLE_ADS_CLIENT_SECRET'),
        'refresh_token' => env('GOOGLE_ADS_REFRESH_TOKEN'),
        'developer_token' => env('GOOGLE_ADS_DEVELOPER_TOKEN'),
        'sync_token' => env('GOOGLE_ADS_SYNC_TOKEN'),
        'api_version' => env('GOOGLE_ADS_API_VERSION', 'v21'),
        'environment' => env('GOOGLE_ADS_ENVIRONMENT', 'production'),
        'auto_sync' => env('GOOGLE_ADS_AUTO_SYNC', true),
    ],

];
