<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class InstagramService
{
    /**
     * Fetch Instagram media posts
     *
     * @param int $limit Number of posts to fetch
     * @return array
     */
    public function fetchMedia(int $limit = 12): array
    {
        try {
            $accessToken = config('services.instagram.access_token');
            $userId = config('services.instagram.user_id');

            if (!$accessToken || !$userId) {
                Log::warning('Instagram credentials not configured');
                return [
                    'success' => false,
                    'message' => 'Instagram credentials not configured',
                ];
            }

            // Check cache first
            $cacheKey = "instagram_media_{$limit}";
            $cached = Cache::get($cacheKey);

            if ($cached) {
                return [
                    'success' => true,
                    'data' => $cached,
                ];
            }

            // Fetch posts from Instagram Graph API
            $response = Http::get("https://graph.instagram.com/{$userId}/media", [
                'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,like_count,comments_count,timestamp',
                'limit' => $limit,
                'access_token' => $accessToken,
            ]);

            if (!$response->successful()) {
                Log::error('Instagram API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'success' => false,
                    'message' => 'Failed to fetch from Instagram API',
                ];
            }

            $data = $response->json();

            if (!isset($data['data'])) {
                Log::warning('Instagram API returned unexpected format', ['data' => $data]);
                return [
                    'success' => false,
                    'message' => 'Unexpected API response format',
                ];
            }

            // Include all media types: IMAGE, VIDEO, CAROUSEL_ALBUM
            // Use thumbnail_url for videos, media_url for images
            $media = collect($data['data'])
                ->take($limit)
                ->map(function ($item) {
                    return [
                        'id' => $item['id'] ?? null,
                        'caption' => $item['caption'] ?? '',
                        'media_type' => $item['media_type'] ?? 'IMAGE',
                        'media_url' => $item['media_url'] ?? null,
                        'thumbnail_url' => $item['thumbnail_url'] ?? null,
                        'permalink' => $item['permalink'] ?? '#',
                        'like_count' => $item['like_count'] ?? 0,
                        'comments_count' => $item['comments_count'] ?? 0,
                        'timestamp' => $item['timestamp'] ?? null,
                    ];
                })
                ->values()
                ->toArray();

            // Cache for 1 hour
            Cache::put($cacheKey, $media, 3600);

            return [
                'success' => true,
                'data' => $media,
            ];

        } catch (\Exception $e) {
            Log::error('Error in InstagramService@fetchMedia: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'message' => 'An error occurred while fetching Instagram media',
            ];
        }
    }

    /**
     * Clear Instagram media cache
     *
     * @return bool
     */
    public function clearCache(): bool
    {
        try {
            // Clear all instagram cache keys
            $keys = ['instagram_media_12', 'instagram_media_6', 'instagram_media_3'];

            foreach ($keys as $key) {
                Cache::forget($key);
            }

            Log::info('Instagram cache cleared');
            return true;

        } catch (\Exception $e) {
            Log::error('Error clearing Instagram cache: ' . $e->getMessage());
            return false;
        }
    }
}
