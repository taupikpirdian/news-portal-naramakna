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

            // Check cache first - reduced to 3 minutes for fresher data
            $cacheKey = "instagram_media_{$limit}";
            $cached = Cache::get($cacheKey);

            if ($cached) {
                Log::info('Instagram: Returning cached data', ['key' => $cacheKey, 'posts_count' => count($cached)]);
                return [
                    'success' => true,
                    'data' => $cached,
                ];
            }

            // Fetch MORE posts first, then filter to get desired number of feed posts
            // Multiply by 3 to account for excluded reels, but cap at 25 (Instagram API limit)
            $fetchLimit = min($limit * 3, 25);

            // Fetch posts from Instagram Graph API
            // Add more fields to get video thumbnails
            $response = Http::get("https://graph.instagram.com/{$userId}/media", [
                'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,video_url,like_count,comments_count,timestamp',
                'limit' => $fetchLimit,
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

            // Include ALL media types: IMAGE, VIDEO, CAROUSEL_ALBUM
            // For videos, use thumbnail_url as fallback
            $media = collect($data['data'])
                ->map(function ($item) {
                    $mediaType = $item['media_type'] ?? 'IMAGE';
                    $imageUrl = $item['media_url'] ?? null;

                    // For VIDEO/REELS, use thumbnail_url if available
                    if ($mediaType === 'VIDEO' && isset($item['thumbnail_url'])) {
                        $imageUrl = $item['thumbnail_url'];
                    }

                    return [
                        'id' => $item['id'] ?? null,
                        'caption' => $item['caption'] ?? '',
                        'media_type' => $mediaType,
                        'media_url' => $item['media_url'] ?? null,
                        'thumbnail_url' => $item['thumbnail_url'] ?? null,
                        'image_url' => $imageUrl,
                        'permalink' => $item['permalink'] ?? '#',
                        'like_count' => $item['like_count'] ?? 0,
                        'comments_count' => $item['comments_count'] ?? 0,
                        'timestamp' => $item['timestamp'] ?? null,
                        'timestamp_utc' => $item['timestamp'] ?? null, // Keep UTC for reference
                    ];
                })
                ->filter(function ($item) {
                    // Only include items that have an image URL
                    return !is_null($item['image_url']);
                })
                ->sortByDesc('timestamp') // Sort by timestamp descending (newest first)
                ->take($limit) // Take AFTER filtering and sorting to ensure we get exactly $limit posts
                ->values()
                ->toArray();

            // Cache for 3 minutes to balance freshness and performance
            // Instagram like_count & comments_count update frequently, so we need fresh data
            Cache::put($cacheKey, $media, 180); // 3 minutes (was 900 = 15 minutes)

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
