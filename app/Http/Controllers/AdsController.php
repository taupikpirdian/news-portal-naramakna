<?php

namespace App\Http\Controllers;

use App\Services\AdsService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdsController extends Controller
{
    protected AdsService $adsService;

    public function __construct(AdsService $adsService)
    {
        $this->adsService = $adsService;
    }

    /**
     * Serve ads based on placement type
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function serve(Request $request): JsonResponse
    {
        $placement = $request->query('placement');
        $limit = $request->query('limit', 1);

        $result = $this->adsService->fetchAds($placement, $limit);

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $result['data'],
        ]);
    }
}
