<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class NaramaknaApiService
{
    protected string $baseUrl;
    protected int $cacheTtl;

    public function __construct()
    {
        $this->baseUrl = config('services.naramakna.base_url', 'https://api.naramakna.id');
        $this->cacheTtl = config('services.naramakna.cache_ttl', 3600); // 1 hour default
    }

    /**
     * Fetch categories from the API
     *
     * @param int $limit
     * @param bool $mainCategoriesOnly
     * @return array
     */
    public function getCategories(int $limit = 50, bool $mainCategoriesOnly = true): array
    {
        return Cache::remember("categories", $this->cacheTtl, function () use ($limit, $mainCategoriesOnly) {
            $response = Http::timeout(10)->get("{$this->baseUrl}/api/content/categories", [
                'limit' => $limit,
                'mainCategoriesOnly' => $mainCategoriesOnly,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['data']['categories'] ?? [];
            }

            return [];
        });
    }

    /**
     * Fetch posts by category from the API
     *
     * @param string $categorySlug
     * @param int $limit
     * @param string $type
     * @return array
     */
    public function getPostsByCategory(string $categorySlug, int $limit = 5, string $type = 'post'): array
    {
        return Cache::remember("posts.{$categorySlug}", $this->cacheTtl, function () use ($categorySlug, $limit, $type) {
            $response = Http::timeout(10)->get("{$this->baseUrl}/api/content/feed", [
                'limit' => $limit,
                'type' => $type,
                'category' => $categorySlug,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['data']['posts'] ?? [];
            }

            return [];
        });
    }

    /**
     * Fetch latest posts from the API
     *
     * @param int $limit
     * @param string $type
     * @param bool $mainCategoriesOnly
     * @return array
     */
    public function getLatestPosts(int $limit = 7, string $type = 'post', bool $mainCategoriesOnly = true): array
    {
        return Cache::remember("latest_posts", $this->cacheTtl, function () use ($limit, $type, $mainCategoriesOnly) {
            $response = Http::timeout(10)->get("{$this->baseUrl}/api/content/feed", [
                'limit' => $limit,
                'type' => $type,
                'mainCategoriesOnly' => $mainCategoriesOnly,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['data']['posts'] ?? [];
            }

            return [];
        });
    }

    /**
     * Fetch a single post by slug
     *
     * @param string $slug
     * @return array|null
     */
    public function getPostBySlug(string $slug): ?array
    {
        return Cache::remember("read.{$slug}", $this->cacheTtl, function () use ($slug) {
            $response = Http::timeout(10)->get("{$this->baseUrl}/api/content/posts/slug/{$slug}");

            if ($response->successful()) {
                $data = $response->json();
                // The API response for single post might be direct object or wrapped in data
                return $data['data'] ?? $data;
            }

            return null;
        });
    }

    /**
     * Fetch feed posts
     *
     * @param int $page
     * @param int $limit
     * @param string $sortBy
     * @param string $sortOrder
     * @return array
     */
    public function getFeed(int $page = 1, int $limit = 12, string $sortBy = 'date', string $sortOrder = 'desc'): array
    {
        $response = Http::timeout(10)->get("{$this->baseUrl}/api/content/feed", [
            'page' => $page,
            'limit' => $limit,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['data'] ?? [];
        }

        return [];
    }

    /**
     * Fetch category posts with pagination
     *
     * @param string $categorySlug
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function getCategoryPostsWithPagination(string $categorySlug, int $limit = 10, int $offset = 0): array
    {
        $response = Http::timeout(10)->get("{$this->baseUrl}/api/category/{$categorySlug}/posts", [
            'limit' => $limit,
            'offset' => $offset,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['data'] ?? [
                'posts' => [],
                'pagination' => [
                    'total' => 0,
                    'limit' => $limit,
                    'offset' => $offset,
                    'hasMore' => false,
                ],
                'category' => [
                    'slug' => $categorySlug,
                    'name' => $categorySlug,
                ],
            ];
        }

        return [
            'posts' => [],
            'pagination' => [
                'total' => 0,
                'limit' => $limit,
                'offset' => $offset,
                'hasMore' => false,
            ],
            'category' => [
                'slug' => $categorySlug,
                'name' => $categorySlug,
            ],
        ];
    }

    /**
     * Clear cache for categories
     *
     * @return void
     */
    public function clearCategoriesCache(): void
    {
        $categories = $this->getCategories();
        foreach ($categories as $category) {
            Cache::forget("posts.{$category['slug']}");
        }
        Cache::forget('categories');
    }

    /**
     * Clear cache for specific category
     *
     * @param string $categorySlug
     * @return void
     */
    public function clearCategoryCache(string $categorySlug): void
    {
        Cache::forget("posts.{$categorySlug}");
    }

    /**
     * Clear cache for specific post
     *
     * @param string $slug
     * @return void
     */
    public function clearPostCache(string $slug): void
    {
        Cache::forget("post.{$slug}");
    }

    /**
     * Clear all feed cache
     *
     * @return void
     */
    public function clearFeedCache(): void
    {
        Cache::forget('latest_posts');
    }

    /**
     * Clear all API cache
     *
     * @return void
     */
    public function clearAllCache(): void
    {
        $this->clearCategoriesCache();
        $this->clearFeedCache();
    }
}
