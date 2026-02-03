<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NaramaknaApiService;

class HomeController extends Controller
{
    protected NaramaknaApiService $apiService;

    public function __construct(NaramaknaApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function home()
    {
        // Fetch all categories (metadata only, for lazy loading)
        $categories = $this->apiService->getCategories(50, true);

        // Fetch posts only for the first 2 categories (for initial load)
        $initialCategories = [];
        $remainingCategories = [];

        foreach ($categories as $index => $category) {
            $categoryData = [
                'id' => $category['id'],
                'name' => $category['name'],
                'slug' => $category['slug'],
                'count' => $category['count'],
            ];

            if ($index < 2) {
                // Fetch posts for first 2 categories
                $posts = $this->apiService->getPostsByCategory($category['slug'], 6, 'post');
                $categoryData['posts'] = $posts;
                $initialCategories[] = $categoryData;
            } else {
                // Only metadata for remaining categories
                $categoryData['posts'] = [];
                $remainingCategories[] = $categoryData;
            }
        }

        return view('pages.home', [
            'initialCategories' => $initialCategories,
            'remainingCategories' => $remainingCategories,
            'allCategories' => array_merge($initialCategories, $remainingCategories),
        ]);
    }

    /**
     * API endpoint for lazy loading category posts
     */
    public function loadCategoryPosts(Request $request)
    {
        $slug = $request->query('slug');
        $limit = $request->query('limit', 6);

        if (!$slug) {
            return response()->json([
                'success' => false,
                'message' => 'Category slug is required',
            ], 400);
        }

        $posts = $this->apiService->getPostsByCategory($slug, $limit, 'post');

        return response()->json([
            'success' => true,
            'data' => [
                'posts' => $posts,
            ],
        ]);
    }

    public function index()
    {
        return view('pages.index');
    }

    public function detail()
    {
        return view('pages.detail');
    }

    public function bantuan()
    {
        return view('pages.bantuan');
    }

    public function kerjaSama()
    {
        return view('pages.kerja-sama');
    }

    public function tentangKami()
    {
        return view('pages.tentang-kami');
    }

    public function caraMenulis()
    {
        return view('pages.cara-menulis');
    }
}
