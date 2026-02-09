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
            $feedData = $this->apiService->getFeed(1, 20, 'date', 'desc');
            $posts = $feedData['posts'] ?? [];

            return response()->view('rss.feed', [
                'posts' => $posts,
            ])->header('Content-Type', 'application/xml');
        } catch (\Exception $e) {
            // Return empty RSS feed on error
            return response()->view('rss.feed', [
                'posts' => [],
            ])->header('Content-Type', 'application/xml');
        }
    }
}
