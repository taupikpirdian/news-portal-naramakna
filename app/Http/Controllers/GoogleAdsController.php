<?php

namespace App\Http\Controllers;

use App\Services\GoogleAdsService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class GoogleAdsController extends Controller
{
    protected GoogleAdsService $googleAdsService;

    public function __construct(GoogleAdsService $googleAdsService)
    {
        $this->googleAdsService = $googleAdsService;
    }

    /**
     * Get customer information
     */
    public function getCustomerInfo(Request $request): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $customerInfo = $this->googleAdsService->getCustomerInfo($customerId);

            if (!$customerInfo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to retrieve customer information',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'data' => $customerInfo,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getCustomerInfo: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving customer information',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all campaigns
     */
    public function getCampaigns(Request $request): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $campaigns = $this->googleAdsService->getCampaigns($customerId);

            return response()->json([
                'success' => true,
                'data' => [
                    'campaigns' => $campaigns,
                    'count' => count($campaigns),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getCampaigns: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving campaigns',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get campaign statistics
     */
    public function getCampaignStats(Request $request, string $campaignId): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $stats = $this->googleAdsService->getCampaignStats($campaignId, $customerId);

            if (!$stats) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to retrieve campaign statistics',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $stats,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getCampaignStats: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving campaign statistics',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create a new campaign
     */
    public function createCampaign(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'budget_resource_name' => 'required|string',
                'start_date' => 'nullable|string|date_format:Ymd',
                'end_date' => 'nullable|string|date_format:Ymd',
            ]);

            $customerId = $request->query('customer_id');
            $campaignId = $this->googleAdsService->createCampaign($validated, $customerId);

            if (!$campaignId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create campaign',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Campaign created successfully',
                'data' => [
                    'campaign_id' => $campaignId,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in createCampaign: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating campaign',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get ad groups for a campaign
     */
    public function getAdGroups(Request $request, string $campaignId): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $adGroups = $this->googleAdsService->getAdGroups($campaignId, $customerId);

            return response()->json([
                'success' => true,
                'data' => [
                    'ad_groups' => $adGroups,
                    'count' => count($adGroups),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getAdGroups: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving ad groups',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create an ad group
     */
    public function createAdGroup(Request $request, string $campaignId): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'cpc_bid_micros' => 'nullable|integer|min:0',
            ]);

            $customerId = $request->query('customer_id');
            $adGroupId = $this->googleAdsService->createAdGroup($campaignId, $validated, $customerId);

            if (!$adGroupId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create ad group',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Ad group created successfully',
                'data' => [
                    'ad_group_id' => $adGroupId,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in createAdGroup: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating ad group',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get ads for an ad group
     */
    public function getAds(Request $request, string $adGroupId): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $ads = $this->googleAdsService->getAds($adGroupId, $customerId);

            return response()->json([
                'success' => true,
                'data' => [
                    'ads' => $ads,
                    'count' => count($ads),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getAds: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving ads',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create a text ad
     */
    public function createTextAd(Request $request, string $adGroupId): JsonResponse
    {
        try {
            $validated = $request->validate([
                'headline' => 'required|string|max:30',
                'description1' => 'required|string|max:90',
                'description2' => 'nullable|string|max:90',
                'status' => 'nullable|string|in:ENABLED,PAUSED,REMOVED',
            ]);

            $customerId = $request->query('customer_id');
            $adId = $this->googleAdsService->createTextAd($adGroupId, $validated, $customerId);

            if (!$adId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create text ad',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Text ad created successfully',
                'data' => [
                    'ad_id' => $adId,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in createTextAd: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating text ad',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get keywords for an ad group
     */
    public function getKeywords(Request $request, string $adGroupId): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $keywords = $this->googleAdsService->getKeywords($adGroupId, $customerId);

            return response()->json([
                'success' => true,
                'data' => [
                    'keywords' => $keywords,
                    'count' => count($keywords),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getKeywords: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving keywords',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create a keyword
     */
    public function createKeyword(Request $request, string $adGroupId): JsonResponse
    {
        try {
            $validated = $request->validate([
                'keyword_text' => 'required|string|max:80',
                'match_type' => 'required|string|in:BROAD,PHRASE,EXACT',
            ]);

            $customerId = $request->query('customer_id');
            $keywordId = $this->googleAdsService->createKeyword(
                $adGroupId,
                $validated['keyword_text'],
                $validated['match_type'],
                $customerId
            );

            if (!$keywordId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create keyword',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Keyword created successfully',
                'data' => [
                    'keyword_id' => $keywordId,
                ],
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in createKeyword: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating keyword',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get account summary
     */
    public function getAccountSummary(Request $request): JsonResponse
    {
        try {
            $customerId = $request->query('customer_id');
            $summary = $this->googleAdsService->getAccountSummary($customerId);

            if (!$summary) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to retrieve account summary',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'data' => $summary,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getAccountSummary: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while retrieving account summary',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Sync data with Naramakna API
     */
    public function syncWithNaramakna(Request $request): JsonResponse
    {
        try {
            $result = $this->googleAdsService->syncWithNaramakna();

            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Google Ads data synced successfully with Naramakna API',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to sync Google Ads data with Naramakna API',
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error in syncWithNaramakna: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while syncing with Naramakna API',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Fetch ad for display (public endpoint)
     */
    public function fetchAd(Request $request): JsonResponse
    {
        try {
            $type = $request->query('type', 'leaderboard');

            // Validate ad type
            $validTypes = ['leaderboard', 'sidebar_left', 'sidebar_right', 'in_article'];
            if (!in_array($type, $validTypes)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid ad type',
                ], 400);
            }

            // Check if ad unit is enabled
            $adUnitConfig = config("ads.ad_units.{$type}");
            if (!$adUnitConfig || !$adUnitConfig['enabled']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ad unit is disabled',
                ], 404);
            }

            // In test mode or static source, return mock ad data
            if (config('ads.test_mode') || config('ads.data_source') === 'static') {
                $mockAdData = [
                    'headline' => 'Special Offer - ' . str_replace('_', ' ', ucfirst($type)),
                    'description' => 'Get the best deals on our products. Limited time offer!',
                    'display_url' => 'www.example.com',
                    'destination_url' => 'https://example.com',
                    'type' => $type,
                ];

                return response()->json([
                    'success' => true,
                    'data' => $mockAdData,
                ]);
            }

            // For dynamic ads from API (future implementation)
            // You can add logic here to fetch from Google Ads API
            return response()->json([
                'success' => false,
                'message' => 'Dynamic ads not yet implemented',
            ], 501);

        } catch (\Exception $e) {
            Log::error('Error in fetchAd: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching ad',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Test connection
     */
    public function testConnection(): JsonResponse
    {
        try {
            $customerInfo = $this->googleAdsService->getCustomerInfo();

            if ($customerInfo) {
                return response()->json([
                    'success' => true,
                    'message' => 'Google Ads connection successful',
                    'data' => $customerInfo,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Google Ads connection failed',
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error in testConnection: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Google Ads connection test failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
