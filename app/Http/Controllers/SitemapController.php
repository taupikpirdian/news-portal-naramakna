<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NaramaknaApiService;
use Carbon\Carbon;

class SitemapController extends Controller
{
    protected NaramaknaApiService $apiService;

    public function __construct(NaramaknaApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Generate main sitemap index
     */
    public function index()
    {
        $sitemapUrls = [
            route('sitemap.pages'),
            route('sitemap.posts'),
            route('sitemap.categories'),
        ];

        return response()->view('sitemap.index', [
            'sitemaps' => $sitemapUrls,
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for static pages
     */
    public function pages()
    {
        $staticPages = [
            [
                'url' => url('/'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'url' => url('/index'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'hourly',
                'priority' => '0.9',
            ],
            [
                'url' => url('/tentang-kami'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'url' => url('/bantuan'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'url' => url('/kerja-sama'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'url' => url('/cara-menulis'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
        ];

        return response()->view('sitemap.pages', [
            'pages' => $staticPages,
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Generate sitemap for posts/articles
     */
    public function posts()
    {
        try {
            // Fetch all posts (you may want to adjust the limit based on your needs)
            $feedData = $this->apiService->getFeed(1, 1000, 'date', 'desc');
            $posts = $feedData['posts'] ?? [];

            $postUrls = [];
            foreach ($posts as $post) {
                $postUrls[] = [
                    'url' => url('/read/' . ($post['slug'] ?? '')),
                    'lastmod' => isset($post['modified_at'])
                        ? Carbon::parse($post['modified_at'])->toAtomString()
                        : (isset($post['created_at']) ? Carbon::parse($post['created_at'])->toAtomString() : Carbon::now()->toAtomString()),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }

            return response()->view('sitemap.posts', [
                'posts' => $postUrls,
            ])->header('Content-Type', 'text/xml');
        } catch (\Exception $e) {
            // Return empty sitemap on error
            return response()->view('sitemap.posts', [
                'posts' => [],
            ])->header('Content-Type', 'text/xml');
        }
    }

    /**
     * Generate sitemap for categories
     */
    public function categories()
    {
        try {
            $categories = $this->apiService->getCategories(100, true);

            $categoryUrls = [];
            foreach ($categories as $category) {
                $categoryUrls[] = [
                    'url' => url('/kategori/' . ($category['slug'] ?? '')),
                    'lastmod' => Carbon::now()->toAtomString(),
                    'changefreq' => 'daily',
                    'priority' => '0.7',
                ];
            }

            return response()->view('sitemap.categories', [
                'categories' => $categoryUrls,
            ])->header('Content-Type', 'text/xml');
        } catch (\Exception $e) {
            // Return empty sitemap on error
            return response()->view('sitemap.categories', [
                'categories' => [],
            ])->header('Content-Type', 'text/xml');
        }
    }
}
