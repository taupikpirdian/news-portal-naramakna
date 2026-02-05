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
        $about = $this->apiService->getAbout();

        // Parse hero subtitle for intro content
        $heroParagraphs = [];
        if ($about && !empty($about['hero_subtitle'])) {
            // Extract paragraphs
            preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $about['hero_subtitle'], $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $p) {
                    $heroParagraphs[] = trim(strip_tags($p));
                }
            }
        }

        // Parse mission content to extract items
        $missionItems = [];
        if ($about && !empty($about['mission_content'])) {
            // Remove <ul> and </ul> tags
            $content = preg_replace('/<\/?ul[^>]*>/i', '', $about['mission_content']);
            // Extract all <li> items
            preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $content, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $item) {
                    // Get text before <strong> tag as title/prefix
                    $parts = preg_split('/<strong[^>]*>.*?<\/strong>/is', $item, 2);
                    $title = !empty($parts[0]) ? trim(strip_tags($parts[0])) : '';

                    // Extract the bold text from <strong> tag
                    preg_match('/<strong[^>]*>(.*?)<\/strong>/is', $item, $strongMatch);
                    $boldText = !empty($strongMatch[1]) ? strip_tags($strongMatch[1]) : '';

                    // Get text after <strong> tag
                    preg_match('/<\/strong>(.*?)$/is', $item, $afterMatch);
                    $afterText = !empty($afterMatch[1]) ? trim(strip_tags($afterMatch[1])) : '';

                    // Combine for description
                    $description = $boldText . ' ' . $afterText;
                    $description = trim($description);

                    // Ensure title has capital first letter for each word (Title Case)
                    if ($title && mb_strlen($title) > 0) {
                        $title = ucwords(mb_strtolower($title));
                    }

                    $missionItems[] = [
                        'title' => $title,
                        'description' => $description
                    ];
                }
            }
        }

        // Parse values content to extract service items
        $valueItems = [];
        if ($about && !empty($about['values_content'])) {
            // Split by <p> tags
            preg_match_all('/<p[^>]*>(.*?)<\/p>/is', $about['values_content'], $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $index => $item) {
                    // Skip the first item as it's the title "Solusi komprehensif..."
                    if ($index === 0) continue;

                    // Extract title from <strong> tag
                    preg_match('/<strong[^>]*>(.*?)<\/strong>/is', $item, $titleMatch);
                    $title = !empty($titleMatch[1]) ? strip_tags($titleMatch[1]) : '';

                    // Get description by removing the title part
                    $description = preg_replace('/<strong[^>]*>.*?<\/strong>/is', '', $item);
                    $description = trim(strip_tags($description));

                    // Ensure title has capital first letter for each word (Title Case)
                    if ($title && mb_strlen($title) > 0) {
                        $title = ucwords(mb_strtolower($title));
                    }

                    if (!empty($title)) {
                        $valueItems[] = [
                            'title' => $title,
                            'description' => $description
                        ];
                    }
                }
            }
        }

        // Parse team content to extract team members by role
        $teamMembersMap = []; // Use associative array to merge duplicate members
        if ($about && !empty($about['team_content'])) {
            // Find all role sections (pattern: <strong>Role:</strong> followed by <ol>)
            // The pattern needs to handle optional <p> tags
            preg_match_all('/<strong>([^<]+):<\/strong>.*?<ol>(.*?)<\/ol>/is', $about['team_content'], $roleMatches, PREG_SET_ORDER);

            foreach ($roleMatches as $roleMatch) {
                $role = trim(strip_tags($roleMatch[1]));
                $listContent = $roleMatch[2];

                // Extract all <li> items for this role
                preg_match_all('/<li[^>]*>(.*?)<\/li>/is', $listContent, $memberMatches);

                if (!empty($memberMatches[1])) {
                    foreach ($memberMatches[1] as $member) {
                        $memberName = trim(strip_tags($member));
                        if (!empty($memberName)) {
                            // Use member name as key to merge duplicates
                            if (!isset($teamMembersMap[$memberName])) {
                                $teamMembersMap[$memberName] = [
                                    'name' => $memberName,
                                    'roles' => [],
                                    'image' => null
                                ];
                            }
                            // Add role if not already exists
                            if (!in_array($role, $teamMembersMap[$memberName]['roles'])) {
                                $teamMembersMap[$memberName]['roles'][] = $role;
                            }
                        }
                    }
                }
            }
        }

        // Convert map to array and format roles as comma-separated string
        $teamMembers = [];
        foreach ($teamMembersMap as $member) {
            $member['role'] = implode(', ', $member['roles']);
            unset($member['roles']);
            $teamMembers[] = $member;
        }

        return view('pages.tentang-kami', [
            'about' => $about,
            'heroParagraphs' => $heroParagraphs,
            'missionItems' => $missionItems,
            'valueItems' => $valueItems,
            'teamMembers' => $teamMembers,
        ]);
    }

    public function caraMenulis()
    {
        return view('pages.cara-menulis');
    }
}
