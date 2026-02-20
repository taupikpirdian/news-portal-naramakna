<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdsService
{
    /**
     * Fetch ads from external API based on placement and limit
     *
     * @param string $placement
     * @param int $limit
     * @return array
     */
    public function fetchAds(string $placement, int $limit = 1): array
    {
        try {
            // Validate placement
            if (!$this->isValidPlacement($placement)) {
                return [
                    'success' => false,
                    'message' => 'Invalid placement type',
                ];
            }

            // Get external API URL
            $apiUrl = config('ads.external_api_url');

            if (!$apiUrl) {
                return [
                    'success' => true,
                    'data' => [
                        'placement' => $placement,
                        'ads' => [],
                    ],
                ];
            }

            // Build full endpoint URL
            $endpoint = $apiUrl . '/api/ads/serve';

            // Make request to external API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($endpoint, [
                'placement' => $placement,
                'limit' => $limit,
            ]);

            if (!$response->successful()) {
                Log::error('Failed to fetch ads from external API', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'placement' => $placement,
                ]);

                return [
                    'success' => true,
                    'data' => [
                        'placement' => $placement,
                        'ads' => [],
                    ],
                ];
            }

            $responseData = $response->json();

            // The external API already returns { success: true, data: { placement, ads } }
            // So we just return the data part directly
            if ($responseData['success'] && isset($responseData['data'])) {
                return [
                    'success' => true,
                    'data' => $responseData['data'],
                ];
            }

            // Fallback if external API structure is different
            return [
                'success' => true,
                'data' => [
                    'placement' => $placement,
                    'ads' => $responseData['ads'] ?? [],
                ],
            ];

        } catch (\Exception $e) {
            Log::error('Error in AdsService@fetchAds: ' . $e->getMessage(), [
                'placement' => $placement,
                'limit' => $limit,
            ]);

            return [
                'success' => false,
                'message' => 'An error occurred while fetching ads',
            ];
        }
    }

    /**
     * Validate placement type
     *
     * @param string $placement
     * @return bool
     */
    private function isValidPlacement(string $placement): bool
    {
        $validPlacements = ['hero-banner', 'sidebar-left', 'sidebar-right', 'in-article'];
        return in_array($placement, $validPlacements);
    }

    /**
     * Get ad image URL from ad data
     *
     * @param array $ad
     * @return string|null
     */
    public function getAdImageUrl(array $ad): ?string
    {
        return $ad['image_url'] ?? $ad['media_url'] ?? null;
    }

    /**
     * Get ad target URL from ad data
     *
     * @param array $ad
     * @return string|null
     */
    public function getAdTargetUrl(array $ad): ?string
    {
        return $ad['target_url'] ?? null;
    }

    /**
     * Check if ad is active
     *
     * @param array $ad
     * @return bool
     */
    public function isAdActive(array $ad): bool
    {
        return ($ad['status'] ?? '') === 'active';
    }
}
