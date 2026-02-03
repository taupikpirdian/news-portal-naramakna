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
        // ambil 3 data awal untuk carousel
        $featuredPosts = collect($latestPosts)->slice(0, 3)->values()->all();
        // ambil 4 data selanjutnya untuk latest posts
        $latestPosts = collect($latestPosts)->slice(3, 4)->values()->all();
        // Render view with latest posts data
        return view('pages.home', [
            'latestPosts' => $latestPosts,
            'featuredPosts' => $featuredPosts,
        ]);
    }

    /**
     * API endpoint for lazy loading category posts
     */
    public function loadCategoryPosts(Request $request)
    {
        $slug = $request->query('slug');
        $limit = $request->query('limit', 5);

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
        // Fetch feed data for the index page
        $feedData = $this->apiService->getFeed(1, 12, 'date', 'desc');
        $posts = $feedData['posts'] ?? [];
        
        // First post for Headline
        $firstPost = $posts[0] ?? null;
        
        return view('pages.index', [
            'firstPost' => $firstPost,
        ]);
    }

    /**
     * API endpoint for fetching feed posts with pagination (AJAX)
     */
    public function getFeedPosts(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 12);
        $sortBy = $request->query('sortBy', 'date');
        $sortOrder = $request->query('sortOrder', 'desc');

        $data = $this->apiService->getFeed((int)$page, (int)$limit, $sortBy, $sortOrder);

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function category(string $slug)
    {
        // Fetch first post for Headline section (SSR)
        $categoryData = $this->apiService->getCategoryPostsWithPagination($slug, 10, 0);
        $firstPost = $categoryData['posts'][0] ?? null;

        return view('pages.category', [
            'slug' => $slug,
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'firstPost' => $firstPost,
            'category' => $categoryData['category'] ?? null,
        ]);
    }

    /**
     * API endpoint for fetching category posts with pagination (AJAX)
     */
    public function getCategoryPosts(Request $request, string $slug)
    {
        $limit = $request->query('limit', 10);
        $offset = $request->query('offset', 0);

        $data = $this->apiService->getCategoryPostsWithPagination($slug, (int)$limit, (int)$offset);

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function detail($slug = null)
    {
        if (!$slug && request()->has('id')) {
            // Backward compatibility or redirect logic could go here
            // For now, we abort or handle as needed. 
            // If the user uses ID, we might not be able to fetch by slug unless we have a mapping.
            abort(404);
        }
        
        if (!$slug) {
            abort(404);
        }

        $post = $this->apiService->getPostBySlug($slug);

        if (!$post) {
            abort(404);
        }

        // Fetch latest posts for sidebar "Artikel Terbaru"
        $latestPosts = $this->apiService->getLatestPosts(5);

        return view('pages.detail', [
            'post' => $post,
            'latestPosts' => $latestPosts
        ]);
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
