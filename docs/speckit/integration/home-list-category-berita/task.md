# Task: [Integration] Integration Home List Category Berita

## ✅ Tasks (Checklist)
- [x] jalankan specify.md dan implementasikan codenya

## Implementation Details

### 1. Created API Service
- File: `app/Services/NaramaknaApiService.php`
- Methods:
  - `getCategories()`: Fetch categories from `/api/content/categories`
  - `getPostsByCategory()`: Fetch posts by category from `/api/content/feed`
  - Includes caching to improve performance

### 2. Updated HomeController
- File: `app/Http/Controllers/HomeController.php`
- Injected `NaramaknaApiService`
- Modified `home()` method to:
  - Fetch all categories
  - Fetch posts for each category
  - Pass data to view

### 3. Added Configuration
- File: `config/services.php`
- Added `naramakna` configuration with:
  - `base_url`: API base URL (default: https://api.naramakna.id)
  - `cache_ttl`: Cache time-to-live (default: 3600 seconds)

### 4. Updated Home Page View
- File: `resources/views/pages/home.blade.php`
- Replaced static category section with dynamic loop
- Each category displays:
  - Category name
  - First post as featured article (large image)
  - Next 4 posts as list items (small images)
- AdSense placeholder inserted after every 2 categories

### Features
✓ Dynamic category list from API
✓ Dynamic posts per category
✓ Responsive layout maintained
✓ AdSense placeholders every 2 categories
✓ Error handling with fallback images
✓ Date formatting with Carbon
✓ Content excerpt with limit
