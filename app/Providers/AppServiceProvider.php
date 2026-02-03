<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\NaramaknaApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(NaramaknaApiService $apiService): void
    {
        View::composer('components.header', function ($view) use ($apiService) {
            $categories = $apiService->getCategories(50, false);
            
            // Filter unique categories by slug and prioritize nicely formatted names
            $uniqueCategories = collect($categories)
                ->sortByDesc(function ($category) {
                    // Prioritize names that are NOT the same as the slug (simple heuristic)
                    return $category['name'] !== $category['slug'] ? 1 : 0;
                })
                ->unique('slug')
                ->map(function ($category) {
                    // Ensure name is title case if it matches the slug (fallback formatting)
                    if ($category['name'] === $category['slug'] || strtolower($category['name']) === $category['slug']) {
                        $category['name'] = ucwords(str_replace('-', ' ', $category['slug']));
                    }
                    return $category;
                })
                ->values();

            // Split categories: first 9 for main nav, rest for sub nav (max 10)
            $mainCategories = $uniqueCategories->take(9);
            $subCategories = $uniqueCategories->slice(9)->take(9)->values();

            $view->with('headerCategories', $mainCategories);
            $view->with('subHeaderCategories', $subCategories);
        });

        View::composer('components.sidebar', function ($view) use ($apiService) {
            $categories = $apiService->getCategories(50, false);
            
            $uniqueCategories = collect($categories)
                ->sortByDesc(function ($category) {
                    return $category['name'] !== $category['slug'] ? 1 : 0;
                })
                ->unique('slug')
                ->map(function ($category) {
                    if ($category['name'] === $category['slug'] || strtolower($category['name']) === $category['slug']) {
                        $category['name'] = ucwords(str_replace('-', ' ', $category['slug']));
                    }
                    return $category;
                })
                ->values();

            $view->with('sidebarCategories', $uniqueCategories);
        });
    }
}
