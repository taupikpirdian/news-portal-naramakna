# Task: [Integration] Integration Hero Banner

## ✅ Tasks (Checklist)
- [x] analysis dan jalankan specify.md dan implementasikan codenya

## Implementation Summary

### Files Created:
1. **AdsController.php** (app/Http/Controllers/AdsController.php)
   - Endpoint: `/api/ads/serve`
   - Fetches ads from external API based on placement and limit parameters
   - Returns JSON response with ad data

2. **hero-banner.blade.php** (resources/views/components/hero-banner.blade.php)
   - Blade component that fetches and displays hero banner ads
   - Uses Alpine.js for dynamic content loading
   - Shows loading state, ad content, or fallback to Google Ads

### Files Modified:
1. **routes/api.php**
   - Added public route: `GET /api/ads/serve`

2. **resources/views/layouts/app.blade.php**
   - Replaced Google Ads with hero-banner component at line 71

3. **config/ads.php**
   - Added external API URL configuration

### Configuration:
Add to `.env` file:
```env
ADS_EXTERNAL_API_URL=https://api.naramakna.id/ads/serve
ADS_EXTERNAL_API_KEY=your_api_key_here
```

### Behavior:
- ✅ Shows hero banner ad when API returns data
- ✅ Falls back to Google Ads when no ad data available
- ✅ Hides entirely when both are unavailable
