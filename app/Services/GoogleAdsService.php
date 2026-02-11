<?php

namespace App\Services;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V21\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\V21\Errors\GoogleAdsException;
use Google\Ads\GoogleAds\V21\Resources\AdGroupAd;
use Google\Ads\GoogleAds\V21\Common\AdTextAd;
use Google\Ads\GoogleAds\V21\Resources\AdGroup;
use Google\Ads\GoogleAds\V21\Resources\Campaign;
use Google\Ads\GoogleAds\V21\Enums\AdGroupStatusEnum\AdGroupStatus;
use Google\Ads\GoogleAds\V21\Enums\CampaignStatusEnum\CampaignStatus;
use Google\Ads\GoogleAds\V21\Enums\AdvertisingChannelTypeEnum\AdvertisingChannelType;
use Google\Ads\GoogleAds\V21\Resources\AdGroupCriterion;
use Google\Ads\GoogleAds\V21\Common\KeywordInfo;
use Google\Ads\GoogleAds\V21\Enums\KeywordMatchTypeEnum\KeywordMatchType;
use Google\Ads\GoogleAds\V21\Services\AdGroupAdOperation;
use Google\Ads\GoogleAds\V21\Services\AdGroupOperation;
use Google\Ads\GoogleAds\V21\Services\CampaignOperation;
use Google\Ads\GoogleAds\V21\Services\AdGroupCriterionOperation;
use Google\Ads\GoogleAds\V21\Resources\Campaign_BiddingStrategySystemStatus;
use Google\Ads\GoogleAds\V21\Common\ManualCpc;
use Illuminate\Support\Facades\Log;

class GoogleAdsService
{
    /** @var mixed */
    protected $client;

    protected string $customerId;
    protected string $customerIdAlt;

    public function __construct()
    {
        $this->customerId = config('services.google_ads.customer_id');
        $this->customerIdAlt = config('services.google_ads.customer_id_alt');

        $this->initializeClient();
    }

    /**
     * Initialize Google Ads Client
     */
    protected function initializeClient(): void
    {
        try {
            $oAuth2Credential = (new OAuth2TokenBuilder())
                ->withClientId(config('services.google_ads.client_id'))
                ->withClientSecret(config('services.google_ads.client_secret'))
                ->withRefreshToken(config('services.google_ads.refresh_token'))
                ->build();

            $this->client = (new GoogleAdsClientBuilder())
                ->withDeveloperToken(config('services.google_ads.developer_token'))
                ->withOAuth2Credential($oAuth2Credential)
                ->build();

            Log::info('Google Ads client initialized successfully');
        } catch (\Exception $e) {
            Log::error('Failed to initialize Google Ads client: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get Google Ads Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get customer account information
     */
    public function getCustomerInfo(?string $customerId = null): ?array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $googleAdsServiceClient = $this->client->getCustomerServiceClient();

            $customer = $googleAdsServiceClient->getCustomer($customerId);

            return [
                'id' => $customer->getId(),
                'name' => $customer->getDescriptiveName(),
                'currency_code' => $customer->getCurrencyCode(),
                'time_zone' => $customer->getDateTimeZone(),
                'tracking_url_template' => $customer->getTrackingUrlTemplate(),
                'status' => $customer->getStatus(),
            ];
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error getting customer info: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get all campaigns
     */
    public function getCampaigns(?string $customerId = null): array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $googleAdsServiceClient = $this->client->getCampaignServiceClient();

            $response = $googleAdsServiceClient->search(
                $customerId,
                'SELECT campaign.id, campaign.name, campaign.status, campaign.advertising_channel_type, campaign_budget.amount_micros FROM campaign ORDER BY campaign.name'
            );

            $campaigns = [];
            foreach ($response->iterateAllElements() as $campaign) {
                $campaigns[] = [
                    'id' => $campaign->getId(),
                    'name' => $campaign->getName(),
                    'status' => CampaignStatus::name($campaign->getStatus()),
                    'advertising_channel_type' => AdvertisingChannelType::name($campaign->getAdvertisingChannelType()),
                    'budget_amount_micros' => $campaign->getCampaignBudget()?->getAmountMicros(),
                ];
            }

            return $campaigns;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('Error getting campaigns: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Get campaign statistics
     */
    public function getCampaignStats(string $campaignId, ?string $customerId = null): ?array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $googleAdsServiceClient = $this->client->getCampaignServiceClient();

            $response = $googleAdsServiceClient->search(
                $customerId,
                sprintf(
                    'SELECT campaign.id, campaign.name, metrics.impressions, metrics.clicks, metrics.cost_micros, metrics.ctr, metrics.average_cpc FROM campaign WHERE campaign.id = %s',
                    $campaignId
                )
            );

            foreach ($response->iterateAllElements() as $campaign) {
                return [
                    'campaign_id' => $campaign->getId(),
                    'campaign_name' => $campaign->getName(),
                    'impressions' => $campaign->getMetrics()->getImpressions(),
                    'clicks' => $campaign->getMetrics()->getClicks(),
                    'cost_micros' => $campaign->getMetrics()->getCostMicros(),
                    'ctr' => $campaign->getMetrics()->getCtr(),
                    'average_cpc' => $campaign->getMetrics()->getAverageCpc(),
                ];
            }

            return null;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error getting campaign stats: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Create a new campaign
     */
    public function createCampaign(array $campaignData, ?string $customerId = null): ?string
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $campaignServiceClient = $this->client->getCampaignServiceClient();

            $campaign = new Campaign();
            $campaign->setName($campaignData['name']);
            $campaign->setAdvertisingChannelType(AdvertisingChannelType::SEARCH);
            $campaign->setStatus(CampaignStatus::PAUSED);
            $campaign->setCampaignBudget($campaignData['budget_resource_name']);

            // Set bidding strategy
            $biddingStrategy = new ManualCpc();
            $campaign->setManualCpc($biddingStrategy);

            if (isset($campaignData['start_date'])) {
                $campaign->setStartDate($campaignData['start_date']);
            }

            if (isset($campaignData['end_date'])) {
                $campaign->setEndDate($campaignData['end_date']);
            }

            $operation = new CampaignOperation();
            $operation->setCreate($campaign);

            $response = $campaignServiceClient->mutateCampaigns($customerId, [$operation]);

            Log::info('Campaign created: ' . $response->getResults()[0]->getId());

            return $response->getResults()[0]->getId();
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error creating campaign: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get ad groups for a campaign
     */
    public function getAdGroups(string $campaignId, ?string $customerId = null): array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupServiceClient = $this->client->getAdGroupServiceClient();

            $response = $adGroupServiceClient->search(
                $customerId,
                sprintf(
                    'SELECT ad_group.id, ad_group.name, ad_group.status, ad_group.cpc_bid_micros FROM ad_group WHERE campaign.id = %s',
                    $campaignId
                )
            );

            $adGroups = [];
            foreach ($response->iterateAllElements() as $adGroup) {
                $adGroups[] = [
                    'id' => $adGroup->getId(),
                    'name' => $adGroup->getName(),
                    'status' => AdGroupStatus::name($adGroup->getStatus()),
                    'cpc_bid_micros' => $adGroup->getCpcBidMicros(),
                ];
            }

            return $adGroups;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('Error getting ad groups: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create an ad group
     */
    public function createAdGroup(string $campaignId, array $adGroupData, ?string $customerId = null): ?string
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupServiceClient = $this->client->getAdGroupServiceClient();

            $adGroup = new AdGroup();
            $adGroup->setName($adGroupData['name']);
            $adGroup->setCampaign(sprintf('customers/%s/campaigns/%s', $customerId, $campaignId));
            $adGroup->setStatus(AdGroupStatus::ENABLED);
            $adGroup->setCpcBidMicros($adGroupData['cpc_bid_micros'] ?? 1000000); // Default $1.00

            $operation = new AdGroupOperation();
            $operation->setCreate($adGroup);

            $response = $adGroupServiceClient->mutateAdGroups($customerId, [$operation]);

            Log::info('Ad group created: ' . $response->getResults()[0]->getId());

            return $response->getResults()[0]->getId();
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error creating ad group: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get ads for an ad group
     */
    public function getAds(string $adGroupId, ?string $customerId = null): array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupAdServiceClient = $this->client->getAdGroupAdServiceClient();

            $response = $adGroupAdServiceClient->search(
                $customerId,
                sprintf(
                    'SELECT ad_group_ad.ad.id, ad_group_ad.ad.type, ad_group_ad.status, ad_group_ad.ad.text_ad.headline, ad_group_ad.ad.text_ad.description FROM ad_group_ad WHERE ad_group.id = %s',
                    $adGroupId
                )
            );

            $ads = [];
            foreach ($response->iterateAllElements() as $adGroupAd) {
                $textAd = $adGroupAd->getAd()->getTextAd();
                $ads[] = [
                    'id' => $adGroupAd->getAd()->getId(),
                    'type' => $adGroupAd->getAd()->getType(),
                    'status' => $adGroupAd->getStatus(),
                    'headline' => $textAd ? $textAd->getHeadline() : null,
                    'description' => $textAd ? $textAd->getDescription() : null,
                ];
            }

            return $ads;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('Error getting ads: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create a text ad
     */
    public function createTextAd(string $adGroupId, array $adData, ?string $customerId = null): ?string
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupAdServiceClient = $this->client->getAdGroupAdServiceClient();

            $textAd = new AdTextAd();
            $textAd->setHeadline($adData['headline']);
            $textAd->setDescription1($adData['description1']);

            if (isset($adData['description2'])) {
                $textAd->setDescription2($adData['description2']);
            }

            $adGroupAd = new AdGroupAd();
            $adGroupAd->setAdGroup(sprintf('customers/%s/adGroups/%s', $customerId, $adGroupId));
            $adGroupAd->setStatus($adData['status'] ?? 'PAUSED');
            $adGroupAd->setAd($textAd);

            $operation = new AdGroupAdOperation();
            $operation->setCreate($adGroupAd);

            $response = $adGroupAdServiceClient->mutateAdGroupAds($customerId, [$operation]);

            Log::info('Text ad created: ' . $response->getResults()[0]->getAd()->getId());

            return $response->getResults()[0]->getAd()->getId();
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error creating text ad: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Get keywords for an ad group
     */
    public function getKeywords(string $adGroupId, ?string $customerId = null): array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupCriterionServiceClient = $this->client->getAdGroupCriterionServiceClient();

            $response = $adGroupCriterionServiceClient->search(
                $customerId,
                sprintf(
                    'SELECT ad_group_criterion.criterion_id, ad_group_criterion.keyword.text, ad_group_criterion.keyword.match_type, ad_group_criterion.status FROM ad_group_criterion WHERE ad_group.id = %s AND ad_group_criterion.type = KEYWORD',
                    $adGroupId
                )
            );

            $keywords = [];
            foreach ($response->iterateAllElements() as $criterion) {
                $keywords[] = [
                    'id' => $criterion->getCriterionId(),
                    'text' => $criterion->getKeyword()->getText(),
                    'match_type' => KeywordMatchType::name($criterion->getKeyword()->getMatchType()),
                    'status' => $criterion->getStatus(),
                ];
            }

            return $keywords;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return [];
        } catch (\Exception $e) {
            Log::error('Error getting keywords: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Create a keyword
     */
    public function createKeyword(string $adGroupId, string $keywordText, string $matchType = 'BROAD', ?string $customerId = null): ?string
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $adGroupCriterionServiceClient = $this->client->getAdGroupCriterionServiceClient();

            $keywordInfo = new KeywordInfo();
            $keywordInfo->setText($keywordText);

            // Convert string match type to enum constant
            $matchTypeConstant = constant(KeywordMatchType::class . '::' . strtoupper($matchType));
            $keywordInfo->setMatchType($matchTypeConstant);

            $adGroupCriterion = new AdGroupCriterion();
            $adGroupCriterion->setAdGroup(sprintf('customers/%s/adGroups/%s', $customerId, $adGroupId));
            $adGroupCriterion->setStatus('ENABLED');
            $adGroupCriterion->setKeyword($keywordInfo);

            $operation = new AdGroupCriterionOperation();
            $operation->setCreate($adGroupCriterion);

            $response = $adGroupCriterionServiceClient->mutateAdGroupCriteria($customerId, [$operation]);

            Log::info('Keyword created: ' . $response->getResults()[0]->getCriterionId());

            return $response->getResults()[0]->getCriterionId();
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error creating keyword: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sync data with Naramakna API
     */
    public function syncWithNaramakna(): bool
    {
        try {
            $customerInfo = $this->getCustomerInfo();
            $campaigns = $this->getCampaigns();

            $syncData = [
                'customer' => $customerInfo,
                'campaigns' => $campaigns,
                'synced_at' => now()->toIso8601String(),
                'sync_token' => config('services.google_ads.sync_token'),
            ];

            // Send to Naramakna API
            $httpClient = new \Illuminate\Support\Facades\Http();

            $response = $httpClient::timeout(10)->post(
                config('services.naramakna.base_url') . '/api/google-ads/sync',
                $syncData,
                [
                    'X-API-Key' => config('services.google_ads.sync_token'),
                    'Accept' => 'application/json',
                ]
            );

            if ($response->status() === 200 || $response->status() === 201) {
                Log::info('Google Ads data synced successfully with Naramakna API');
                return true;
            } else {
                Log::error('Failed to sync with Naramakna API: ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Error syncing with Naramakna: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get account statistics summary
     */
    public function getAccountSummary(?string $customerId = null): ?array
    {
        try {
            $customerId = $customerId ?? $this->customerId;
            $googleAdsServiceClient = $this->client->getGoogleAdsServiceClient();

            $response = $googleAdsServiceClient->search(
                $customerId,
                'SELECT metrics.impressions, metrics.clicks, metrics.cost_micros, metrics.ctr, metrics.average_cpc, metrics.conversions, metrics.cost_per_conversion FROM customer'
            );

            foreach ($response->iterateAllElements() as $customer) {
                $metrics = $customer->getMetrics();

                return [
                    'impressions' => $metrics ? $metrics->getImpressions() : 0,
                    'clicks' => $metrics ? $metrics->getClicks() : 0,
                    'cost_micros' => $metrics ? $metrics->getCostMicros() : 0,
                    'ctr' => $metrics ? $metrics->getCtr() : 0,
                    'average_cpc' => $metrics ? $metrics->getAverageCpc() : 0,
                    'conversions' => $metrics ? $metrics->getConversions() : 0,
                    'cost_per_conversion' => $metrics ? $metrics->getCostPerConversion() : 0,
                ];
            }

            return null;
        } catch (GoogleAdsException $e) {
            Log::error('Google Ads API Error: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::error('Error getting account summary: ' . $e->getMessage());
            return null;
        }
    }
}
