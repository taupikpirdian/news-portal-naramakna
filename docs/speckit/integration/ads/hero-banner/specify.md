# Specify: [Integration] Ads Hero Banner

## Purpose
Integrasi endpoint untuk mengambil ads hero banner

## Crul
curl '{{base_url}}/api/ads/serve?placement=hero-banner&limit=1' \
  -H 'Accept: */*' \
  -H 'Accept-Language: en-AU,en-GB;q=0.9,en-US;q=0.8,en;q=0.7' \
  -H 'Connection: keep-alive' \
  -H 'Origin: http://localhost:5173' \
  -H 'Referer: http://localhost:5173/' \
  -H 'Sec-Fetch-Dest: empty' \
  -H 'Sec-Fetch-Mode: cors' \
  -H 'Sec-Fetch-Site: same-site' \
  -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36' \
  -H 'sec-ch-ua: "Not(A:Brand";v="8", "Chromium";v="144", "Google Chrome";v="144"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'sec-ch-ua-platform: "macOS"'

## Response
### 200 OK
```json
{
    "success": true,
    "data": {
        "placement": "hero-banner",
        "ads": [
            {
                "id": 152,
                "campaign_name": "CLOUD",
                "media_type": "image",
                "media_url": "https://api.naramakna.id/ads/ad-1764734852881-730435068.png",
                "image_url": "https://api.naramakna.id/ads/ad-1764734852881-730435068.png",
                "target_url": "https://devfest.cloudbandung.id/",
                "ad_content": "",
                "google_ads_code": "",
                "placement_type": "hero-banner",
                "advertiser": "Super Admin",
                "start_date": "2026-02-18T14:00:00.000Z",
                "end_date": "2026-02-28T14:00:00.000Z",
                "status": "active",
                "impressions": 667,
                "clicks": 0,
                "rotation_mode": "global",
                "rotation_duration": null,
                "rotation_info": {
                    "current_index": 0,
                    "total_ads": 1,
                    "rotation_mode": "global",
                    "global_setting": 3,
                    "current_ad_mode": "global",
                    "current_ad_duration": 3,
                    "duration_unit": "seconds"
                }
            }
        ]
    }
}
```

## Details
- Posisi Hero Banner di page @resources/views/layouts/app.blade.php line: 72
- Ketika data api ads/serve?placement=hero-banner&limit=1 tidak kosong, maka tampilkan hero banner
- Ketika data api ads/serve?placement=hero-banner&limit=1 kosong, maka tidak tampilkan hero banner dengan google ads