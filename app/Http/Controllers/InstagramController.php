<?php

namespace App\Http\Controllers;

use App\Services\InstagramService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    protected InstagramService $instagramService;

    public function __construct(InstagramService $instagramService)
    {
        $this->instagramService = $instagramService;
    }

    /**
     * Get Instagram media posts
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getMedia(Request $request): JsonResponse
    {
        $limit = $request->query('limit', 12);

        // Validate limit
        if ($limit < 1 || $limit > 25) {
            $limit = 12;
        }

        $result = $this->instagramService->fetchMedia($limit);

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $result['data'],
        ]);
    }

    /**
     * Clear Instagram cache
     *
     * @return JsonResponse
     */
    public function clearCache(): JsonResponse
    {
        $result = $this->instagramService->clearCache();

        return response()->json([
            'success' => $result,
            'message' => $result ? 'Instagram cache cleared successfully' : 'Failed to clear cache',
        ]);
    }
}
