<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\NaramaknaApiService;

/**
 * Cache Management Controller
 *
 * Controller untuk mengelola cache Redis secara manual
 * Gunakan controller ini saat Anda perlu clear cache setelah content update
 */
class CacheManagementController extends Controller
{
    protected NaramaknaApiService $apiService;

    public function __construct(NaramaknaApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Clear semua cache
     *
     * @return JsonResponse
     */
    public function clearAll(): JsonResponse
    {
        $this->apiService->clearAllCache();

        return response()->json([
            'success' => true,
            'message' => 'Semua cache berhasil di-clear',
        ]);
    }

    /**
     * Clear cache categories
     *
     * @return JsonResponse
     */
    public function clearCategories(): JsonResponse
    {
        $this->apiService->clearCategoriesCache();

        return response()->json([
            'success' => true,
            'message' => 'Cache categories berhasil di-clear',
        ]);
    }

    /**
     * Clear cache untuk specific category
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function clearCategory(Request $request): JsonResponse
    {
        $slug = $request->input('slug');

        if (!$slug) {
            return response()->json([
                'success' => false,
                'message' => 'Category slug diperlukan',
            ], 400);
        }

        $this->apiService->clearCategoryCache($slug);

        return response()->json([
            'success' => true,
            'message' => "Cache untuk category '{$slug}' berhasil di-clear",
        ]);
    }

    /**
     * Clear cache untuk specific post
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function clearPost(Request $request): JsonResponse
    {
        $slug = $request->input('slug');

        if (!$slug) {
            return response()->json([
                'success' => false,
                'message' => 'Post slug diperlukan',
            ], 400);
        }

        $this->apiService->clearPostCache($slug);

        return response()->json([
            'success' => true,
            'message' => "Cache untuk post '{$slug}' berhasil di-clear",
        ]);
    }

    /**
     * Clear cache feed
     *
     * @return JsonResponse
     */
    public function clearFeed(): JsonResponse
    {
        $this->apiService->clearFeedCache();

        return response()->json([
            'success' => true,
            'message' => 'Cache feed berhasil di-clear',
        ]);
    }

    /**
     * Get cache statistics
     *
     * @return JsonResponse
     */
    public function getStats(): JsonResponse
    {
        // Check if Redis is available
        try {
            $redis = app('redis')->connection();
            $info = $redis->info('memory');

            return response()->json([
                'success' => true,
                'data' => [
                    'cache_driver' => config('cache.default'),
                    'redis_client' => config('database.redis.client'),
                    'redis_memory' => [
                        'used_memory' => $info['used_memory_human'] ?? 'N/A',
                        'used_memory_peak' => $info['used_memory_peak_human'] ?? 'N/A',
                    ],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat terkoneksi ke Redis',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
