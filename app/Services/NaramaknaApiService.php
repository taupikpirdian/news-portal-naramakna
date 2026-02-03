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
        return Cache::remember("categories.{$limit}.{$mainCategoriesOnly}", $this->cacheTtl, function () use ($limit, $mainCategoriesOnly) {
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
    public function getPostsByCategory(string $categorySlug, int $limit = 6, string $type = 'post'): array
    {
        return Cache::remember("posts.{$categorySlug}.{$limit}.{$type}", $this->cacheTtl, function () use ($categorySlug, $limit, $type) {
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
        return Cache::remember("latest_posts.{$limit}.{$type}.{$mainCategoriesOnly}", $this->cacheTtl, function () use ($limit, $type, $mainCategoriesOnly) {
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
     * Clear cache for categories
     *
     * @return void
     */
    public function clearCategoriesCache(): void
    {
        // Clear all categories cache
        $categories = $this->getCategories();
        foreach ($categories as $category) {
            Cache::forget("posts.{$category['slug']}.6.post");
        }
        Cache::forget('categories.50.true');
        Cache::forget('categories.50.false');
    }
}
