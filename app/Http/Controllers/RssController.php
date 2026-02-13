<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NaramaknaApiService;
use Carbon\Carbon;

class RssController extends Controller
{
    protected NaramaknaApiService $apiService;

    public function __construct(NaramaknaApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Generate RSS feed for latest posts
     */
    public function index()
    {
        try {
            $feedData = $this->apiService->getFeed(1, 50, 'date', 'desc');
            $posts = $feedData['posts'] ?? [];

            $postUrls = [];
            foreach ($posts as $post) {
                $postUrls[] = [
                    'url' => url('/artikel/' . ($post['slug'] ?? '')),
                    'lastmod' => isset($post['modified_at'])
                    ?Carbon::parse($post['modified_at'])->toAtomString()
                    : (isset($post['created_at']) ?Carbon::parse($post['created_at'])->toAtomString() : Carbon::now()->toAtomString()),
                    'changefreq' => 'hourly',
                    'priority' => '0.9',
                ];
            }

            return response()->view('sitemap.posts', [
                'posts' => $postUrls,
            ])->header('Content-Type', 'text/xml; charset=UTF-8');
        }
        catch (\Exception $e) {
            return response()->view('sitemap.posts', [
                'posts' => [],
            ])->header('Content-Type', 'text/xml; charset=UTF-8');
        }
    }
}