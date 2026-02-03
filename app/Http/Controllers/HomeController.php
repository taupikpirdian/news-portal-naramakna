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
        // Fetch latest posts for "Artikel Terbaru" section
        $latestPosts = $this->apiService->getLatestPosts(7, 'post', true);

        // Render view with latest posts data
        return view('pages.home', [
            'latestPosts' => $latestPosts,
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

    /**
     * API endpoint for fetching all categories
     */
    public function getCategories(Request $request)
    {
        $limit = $request->query('limit', 50);
        $mainCategoriesOnly = $request->query('mainCategoriesOnly', true);

        $categories = $this->apiService->getCategories((int)$limit, filter_var($mainCategoriesOnly, FILTER_VALIDATE_BOOLEAN));

        // limit 12 dan random order
        $categories = collect($categories)->random(12)->values()->all();

        return response()->json([
            'success' => true,
            'data' => [
                'categories' => $categories,
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
