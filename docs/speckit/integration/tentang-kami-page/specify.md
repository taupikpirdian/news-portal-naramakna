# Specify: [Integration] Page Tentang Kami

## Purpose
Page Tentang Kami masih statis datanya, integrasikan ke api about

## Base URL
https://api.naramakna.id

## Endpoint yang Digunakan
GET /api/about

## Request Body
### GET /api/about

## Response Body
### GET /api/content/categories
- 200 OK:
  ```json
  {
    "success": true,
    "data": {
        "id": 1,
        "title": "Tentang Kami",
        "hero_title": "Tentang Naramakna",
        "hero_subtitle": "<p>Naramakna.id adalah platform media digital yang lahir dari kebutuhan akan ruang dialog yang lebih bermakna di era informasi yang serba cepat. Kami hadir bukan hanya sebagai penyampai berita, melainkan sebagai katalis perubahan sosial yang mendorong masyarakat untuk berpikir lebih kritis dan mendalam.</p><p>Di tengah tsunami informasi digital yang sering kali membingungkan, kami berperan sebagai kompas intelektual yang membantu pembaca menavigasi kompleksitas isu-isu kontemporer. Kami percaya bahwa setiap peristiwa memiliki lapisan makna yang lebih dalam, yang layak untuk dieksplorasi bersama.</p><p>Melalui pendekatan jurnalisme data yang humanis, kami menyajikan fakta dalam kemasan yang tidak hanya informatif, tetapi juga inspiratif. Setiap artikel yang kami terbitkan melewati proses kurasi yang ketat untuk memastikan akurasi, relevansi, dan dampak positif bagi masyarakat.</p><p>Dengan tagline \"Cerdas Memaknai\", kami berkomitmen menjadi bagian dari ekosistem media yang sehat, di mana kebenaran, empati, dan dialog konstruktif menjadi fondasi utama dalam setiap karya jurnalistik kami.</p>",
        "mission_title": "Misi",
        "mission_content": "<ul><li>Menghadirkan <strong>jurnalisme data yang mendalam</strong> dan mudah dipahami untuk memperkaya wawasan publik</li><li>Memfasilitasi <strong>partisipasi aktif masyarakat</strong> dalam membangun narasi bersama yang konstruktif</li><li>Menjembatani kesenjangan antara <strong>kebijakan dan realitas</strong> melalui perspektif yang berimbang</li><li>Menjaga <strong>integritas informasi</strong> dan melawan disinformasi dengan standar jurnalistik tertinggi</li></ul>",
        "vision_title": "Visi",
        "vision_content": "<p>Menjadi media digital terdepan yang menginspirasi transformasi sosial melalui narasi bermakna, menciptakan ekosistem informasi yang sehat, kritis, dan inklusif untuk Indonesia yang lebih cerdas dan berempati.</p>",
        "values_title": "Layanan Unggulan Kami",
        "values_content": "<p><strong>Solusi komprehensif untuk kebutuhan media digital Anda</strong></p><p><strong>Data Intelligence</strong> - Riset mendalam dengan metodologi ilmiah dan analisis data yang akurat untuk menghasilkan insight berkualitas tinggi</p><p><strong>Creative Storytelling</strong> - Kreativitas digital yang memadukan seni visual dengan narasi powerful untuk engagement maksimal</p><p><strong>Strategic Publishing</strong> - Strategi branding holistik dan sistem publishing yang terukur dan berkelanjutan untuk impact jangka panjang</p>",
        "team_title": "Dewan Redaksi",
        "team_content": "<p><strong>Pendiri:</strong></p><ol><li>Dr. Waska Warta, M.M.</li><li>Dr. Yosal Iriantara, M.M.Pd.</li><li>Tansah Rahmatullah, S.T., M.H.</li></ol><p><strong>Dewan Redaksi:</strong></p><ol><li>Dr. Waska Warta, M.M.</li><li>Dr. Yosal Iriantara, M.M.Pd.</li><li>Tansah Rahmatullah, S.T., M.H.</li></ol><p><strong>Pemimpin Redaksi:</strong></p><ol><li>Dr. Yosal Iriantara, M.M.Pd.</li></ol><p><strong>Jurnalis:</strong></p><ol><li>Khaerunnisa</li><li>Aas Fauziah</li></ol><p><strong>Editor Multimedia:</strong></p><ol><li>Try Sukma Wijaya</li></ol><p><strong>Riset &amp; Analisis:</strong></p><ol><li>Wahdi Suardi, S.E., M.Si.</li></ol><p><strong>Komunikasi Pemasaran &amp; Iklan:</strong></p><ol><li>Syamsul Ma’arif</li></ol>",
        "updated_at": "2025-12-03T04:08:51.000Z",
        "created_at": "2025-09-19T10:51:22.000Z",
        "dynamic_sections": [],
        "hero_hidden": 0,
        "mission_hidden": 0,
        "vision_hidden": 0,
        "values_hidden": 0,
        "team_hidden": 0
    }
  }
  ```

#Detail
##BladePath
- resources/views/pages/tentang-kami.blade.php

##Section Siapa Kami?
- line: 23-75
- data: hero_subtitle

##Section Visi dan Misi Kami
- line: 77-117
- line: 86, gunakan data: vision_content
- line: 87-104 Untuk Data Misi karena ada beberapa item, ambil dari data mission_content lalu pecah berdasarkan tag <li>
- line: 89, untuk title misinya pakai data misi yang sudah d pecah tadi dan ambil string data yang memiliki tag <strong>

##Section Layanan Unggulan Kami
- line: 119-174
- data dari values_content
- data values_content di pecah berdasarkan tag <p>
- line: 136, gunakan data pecahan yang memiliki tag <strong>
- line: 137 biarkan statis
- line: 140 menggunakan data pecahan tadi tanpa data dengan tag <strong>

##Section Dewan Redaksi
- line: 176-245
- Image di buat dummy saja