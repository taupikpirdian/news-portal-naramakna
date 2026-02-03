# Specify: [Integration] Home List Category Berita

## Purpose
Integrasi endpoint untuk mengambil list category berita dan list berita berdasarkan category

## Base URL
https://api.naramakna.id

## Endpoint yang Digunakan
GET /api/content/categories?limit=50&mainCategoriesOnly=true
GET /api/content/feed?limit=6&type=post&category=cerita-rasa

## Request Body
### GET /api/content/categories
Query Parameters:
- limit: integer (optional, default: 50)
- mainCategoriesOnly: boolean (optional, default: true)

## GET /api/content/feed
Query Parameters:
- limit: integer (optional, default: 6)
- type: string (optional, default: "post")
- category: string (optional, default: "cerita-rasa")

## Response Body
### GET /api/content/categories
- 200 OK:
  ```json
  {
    "success": true,
    "data": {
        "categories": [
            {
                "id": 5431,
                "name": "Horison",
                "slug": "horison",
                "count": 691,
                "taxonomy": "category"
            },
            {
                "id": 5465,
                "name": "laga-gaya",
                "slug": "laga-gaya",
                "count": 430,
                "taxonomy": "category"
            },
            {
                "id": 5426,
                "name": "Laga & Gaya",
                "slug": "laga-gaya",
                "count": 228,
                "taxonomy": "category"
            },
            {
                "id": 37,
                "name": "Narapandang",
                "slug": "narapandang",
                "count": 143,
                "taxonomy": "category"
            },
            {
                "id": 5422,
                "name": "Cerita Rasa",
                "slug": "cerita-rasa",
                "count": 126,
                "taxonomy": "category"
            },
            {
                "id": 5466,
                "name": "cerita-rasa",
                "slug": "cerita-rasa",
                "count": 105,
                "taxonomy": "category"
            },
            {
                "id": 295,
                "name": "Budaya",
                "slug": "budaya",
                "count": 98,
                "taxonomy": "category"
            },
            {
                "id": 296,
                "name": "Teknologi",
                "slug": "teknologi",
                "count": 84,
                "taxonomy": "category"
            },
            {
                "id": 294,
                "name": "Pendidikan",
                "slug": "pendidikan",
                "count": 69,
                "taxonomy": "category"
            },
            {
                "id": 5427,
                "name": "Wahana",
                "slug": "wahana",
                "count": 56,
                "taxonomy": "category"
            },
            {
                "id": 34,
                "name": "Olah Bola",
                "slug": "sport",
                "count": 48,
                "taxonomy": "category"
            },
            {
                "id": 6317,
                "name": "Liputan Khusus",
                "slug": "liputan-khusus",
                "count": 25,
                "taxonomy": "category"
            },
            {
                "id": 6361,
                "name": "liputan-khusus",
                "slug": "liputan-khusus",
                "count": 25,
                "taxonomy": "category"
            },
            {
                "id": 5432,
                "name": "Jagat Kita",
                "slug": "jagat-kita",
                "count": 12,
                "taxonomy": "category"
            },
            {
                "id": 5561,
                "name": "jagat-kita",
                "slug": "jagat-kita",
                "count": 11,
                "taxonomy": "category"
            },
            {
                "id": 6393,
                "name": "Pelakon",
                "slug": "pelakon",
                "count": 10,
                "taxonomy": "category"
            },
            {
                "id": 6231,
                "name": "mata-elang",
                "slug": "mata-elang",
                "count": 1,
                "taxonomy": "category"
            },
            {
                "id": 5441,
                "name": "otomotif",
                "slug": "otomotif",
                "count": 1,
                "taxonomy": "category"
            },
            {
                "id": 6230,
                "name": "Mata Elang",
                "slug": "mata-elang",
                "count": 0,
                "taxonomy": "category"
            }
        ],
        "total": 19,
        "pagination": {
            "page": 1,
            "limit": 50,
            "totalPages": 1,
            "hasMore": false
        }
    }
  }
  ```

### GET /api/content/feed
- 200 OK:
  ```json
  {
    "success": true,
    "data": {
        "posts": [
            {
                "id": 7582,
                "title": "French Fries Itu Buatan Prancis Atau Belgia",
                "content": "<p>Banyak di antara kita sudah pernah memesan yang populer dengan sebutan French Fries alias kentang goreng. Banyak rumah makan cepat saji yang menawarkan paket kentang goreng ini dengan ayam goreng. Bahkan pernah menjadi santapan yang populer di Indonesia dan menjadi santapan khas warga kota besar.</p><p>Tapi pernahkah kita berpikir, dari mana asal makanan ini? Jika orang bertanya seperti itu pasti jawabannya berasal dari Prancis. Alasannya, karena namanya saja sudah menunjukkan French berarti dari Prancis. Bukan dari negara lain. Kalau dari negara lain, pasti ada penyebutan negaranya sebelum kata fries.</p><p>Ada yang meyakini kalau french fries itu memang berasal dari Prancis. Olahan kentang yang digoreng ini pertama kali dikembangkan di Pramcis oleh seorang pedagang kaki lima di Paris pada masa Revolusi Prancis. Setidaknya, begitulah yang dituliskan Bill O’Neill (2019) dalam “The Fun Knowledge Encyclopedia 3: The Crazy Stories Behind the World's Most Interesting Facts Trivia Bill's General Knowledge”.</p><p>Namun O’Neil; juga mengungkapkan fakta lain. Ada orang Belgia yang mengklaim, orang yang pertama membuat makanan kentang goreng itu adalah orang Belgia. Teknik memasak kentang ini kemudian dilihat seorang pedagang asal Prancis. Pedagang tersebut lantas membawa cara mengolah kentang itu ke negerinya dan menjual kentang goreng itu di Paris dan ternyata laris.</p><p>Orang pun tak menemukan kata sepakat soal asal-usul kentang goreng ini. Dari manakah sesungguhnya berasal. Kenapa dinamakan French Fries kalau memang berasal dari Belgia. Kemudian dijelaskan, karena yang mempopulerkannya adalah pedagang di Paris itu meski penemunya orang Belgia. Mestinya kan kalau ditemukan orang Belgia namanya Belgian Fries.</p><p>Perdebatan asal-usul kentang goreng ini akhirnya menjadi sekedar topik obrolan untuk membangun suasana. Bukan untuk menemukan kebenaran dari mana asalnya kentang goreng ini. Orang berbeda pendapat hanya sekedar untuk berbeda pendapat. Argumentasinya dalam perdebatan pun bukan dikaitkan dengan fakta. Melainkan dengan keyakinan yang dimiliki masing-masing.</p><p>Apalagi kita yang di Indonesia, namanya bukan lagi memakai nama negara melainkan bahan yang digorengnya. Mirip dengan kita menyebut nangka goreng, pisang goreng, ayam goreng atau udang goreng. Tidak menyebut nama asal makanan itu. Maka orang Indonesia jadi berada di pihak yang netral untuk asal-usul kentang goreng itu. Kita tidak terjebak dalam menyatakan berasal dari Prancis atau Belgia. Pokoknya, kentang goreng. Sikap netral dan nonblok, di antara dua kekuatan besar keyakinan asal-usul kentang goreng.</p>",
                "excerpt": "French fries kerap dianggap berasal dari Prancis, namun klaim Belgia memunculkan perdebatan panjang tentang asal-usul kentang goreng dalam sejarah kuliner dunia",
                "type": "post",
                "status": "publish",
                "slug": "french-fries-itu-buatan-prancis-atau-belgia",
                "date": "2026-02-01T09:00:00.000Z",
                "modified": "2026-02-01T09:00:00.000Z",
                "author": {
                    "ID": 4,
                    "display_name": "Yosal Iriantara",
                    "user_email": "Yosal.iriantara@gmail.com",
                    "user_nicename": "yosal-iriantara"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "French fries kerap dianggap berasal dari Prancis, namun klaim Belgia memunculkan perdebatan panjang tentang asal-usul kentang goreng dalam sejarah kuliner dunia",
                    "_summary_social": "French fries kerap dianggap berasal dari Prancis, namun klaim Belgia memunculkan perdebatan panjang tentang asal-usul kentang goreng dalam sejarah kuliner dunia",
                    "_channel": "Cerita Rasa",
                    "_topic": "FrenchFries",
                    "_keyword": "SejarahKuliner, KentangGoreng, KulinerGlobal, MakananPopuler",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "4",
                    "_thumbnail_id": "7581",
                    "_thumbnail_caption": "Sumber Foto: Times Food | Kentang goreng yang pernah sangat populer di Indonesia",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755817920-94561472.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755817920-94561472.jpeg"
                },
                "view_count": 101,
                "views": 101,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755817920-94561472.jpeg",
                    "caption": "Sumber Foto: Times Food | Kentang goreng yang pernah sangat populer di Indonesia",
                    "id": "7581"
                }
            },
            {
                "id": 7595,
                "title": "Kenyal yang Menemani Hidup Sehari-hari",
                "content": "<p>Hampir setiap orang punya memori dengan jajanan aci. Entah itu cilok yang ditusuk bambu di depan sekolah, cireng panas yang dibagi rame-rame saat jam istirahat, atau cimol yang dimakan sambil jalan sore. Jajanan ini tumbuh bersama keseharian kita.</p><p>Aci, tepung dari singkong, memang tak menawarkan rasa yang kompleks. Tapi justru di situlah kekuatannya. Kenyalnya netral, mudah dipadukan dengan apa saja seperti sambal kacang, saus pedas, bumbu seblak, sampai topping kekinian seperti keju atau daging. Dari bahan yang sangat bersahaja, lahirlah ragam camilan yang mengikuti selera zaman.</p><p>Hari ini, jajanan aci tak lagi hanya milik gerobak keliling. Ia ikut bergerak bersama gaya hidup urban. Kita bisa menemukannya di kafe kecil, lapak UMKM, aplikasi pesan antar, bahkan konten mukbang di media sosial. Aci menjadi bagian dari ritme hidup yang serba cepat: murah, praktis, dan mengenyangkan. Cocok untuk jeda singkat di sela aktivitas yang padat.</p><p>Bagi banyak anak muda, makan cilok atau cireng bukan semata soal perut. Ia sering kali jadi alasan untuk berkumpul. Nongkrong terasa lebih hidup saat ada sesuatu yang bisa dikunyah bersama. Jajanan aci hadir sebagai pengikat obrolan, tidak mengintimidasi, tidak eksklusif. Semua orang bisa ikut menikmati, tanpa harus merasa “tidak cukup mampu”.</p><p>Di situ, jajanan aci bekerja sebagai simbol kecil dari gaya hidup yang egaliter. Ia menolak jarak sosial. Tidak ada hierarki rasa, semua setara di hadapan kenyalnya aci dan pedasnya sambal. Bahkan saat tampil lebih modern dengan kemasan estetik dan harga sedikit naik, jejaknya sebagai makanan rakyat masih terasa.</p><p>Namun, seperti gaya hidup lainnya, ada sisi yang perlu disadari bersama. Aci tinggi karbohidrat, minim nutrisi lain. Ketika ia dikonsumsi berlebihan, terutama dengan saus instan dan gorengan, risikonya tidak bisa diabaikan. Sayangnya, euforia jajanan sering membuat kita lupa pada tubuh sendiri.</p><p>Meski begitu, menyalahkan jajanan aci juga bukan jawaban. Ia hanya cermin dari cara kita hidup hari ini, mencari yang cepat, yang akrab, yang bisa dibagi. Barangkali yang kita butuhkan bukan menjauhinya, melainkan lebih sadar saat menikmatinya.</p>",
                "excerpt": "Jajanan aci seperti cilok dan cireng menjadi bagian gaya hidup sehari-hari: murah, egaliter, dan akrab, sekaligus mencerminkan ritme hidup urban masa kini.",
                "type": "post",
                "status": "publish",
                "slug": "kenyal-yang-menemani-hidup-sehari-hari",
                "date": "2026-02-01T06:00:00.000Z",
                "modified": "2026-02-01T06:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Jajanan aci seperti cilok dan cireng menjadi bagian gaya hidup sehari-hari: murah, egaliter, dan akrab, sekaligus mencerminkan ritme hidup urban masa kini.",
                    "_summary_social": "Jajanan aci seperti cilok dan cireng menjadi bagian gaya hidup sehari-hari: murah, egaliter, dan akrab, sekaligus mencerminkan ritme hidup urban masa kini.",
                    "_channel": "Cerita Rasa",
                    "_topic": "JajananAci",
                    "_keyword": "Cilok, Cireng, MakananRakyat, JajananPinggiran, KulinerIndonesia",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7594",
                    "_thumbnail_caption": "Aneka jajanan yang terbuat dari Aci",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769923188507-127648865.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769923188507-127648865.jpeg"
                },
                "view_count": 14,
                "views": 14,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769923188507-127648865.jpeg",
                    "caption": "Aneka jajanan yang terbuat dari Aci",
                    "id": "7594"
                }
            },
            {
                "id": 7580,
                "title": "Asal Usul Teh",
                "content": "<p>Memulai hari dan mengakhiri hari dengan minum secangkir teh terasa menyegarkan. Tidak mengherankan jika di tengah kita ada candaan, jalan-jalan di kebun teh saja sudah menyenangkan apalagi kalau meminum tehnya pasti lebih menyenangkan. Teh sudah menjadi bagian dari kehidupan kita.</p><p>Tapi sejak kapan manusia biasa meminum teh? Konon kebiasaan minum teh itu dimulai sejak 2737 SM di Tiongkok. Asal-mulanya pun bukan sengaja. Konon saat itu, seorang kaisar Tiongkok sedang duduk-duduk di istananya dengan jendela terbuka. Di hadapannya ada segelas air panas sebagai minuman kesukaannya. Karena angin bertiup kencang, beberapa helai daun kering terbawa angin dan jatuh di gelas sang kaisar.</p><p>Kaisar meminum air panasnya yang sudah ada helaian daun yang jatuh itu. Di luar dugaan, air panasnya itu menjadi terasa lebih nikmat. Lebih membuatnya merasa nyaman. Sejak saat itulah, kaisar selalu mencampurkan daun teh ke dalam minumannya. Kebiasaan minum teh pun mulai muncul dalam peradaban manusia.</p><p>Orang menaburkan bubur daun teh, yang bisa dicampur juga dengan melati atau semacamnya untuk memberi rasa harum pada teh yang diminumnya. Kebiasaan mencampur teh dan air panas itu pun berkembang ke seluruh dunia, termasuk Indonesia. Kita mengenal teh poci misalnya sebagai cara kita menikmati minum teh.</p><p>Tapi tentu tidak praktis minum teh dengan cara mencampurkan bubur teh ke dalam air panas. Sering ampas tehnya terbawa ke dalam gelas dan mengganggu kenikmatan minum teh. Orang hanya membutuhkan rasa tehnya, bukan ampas tehnya.</p><p>Rupanya manusia membutuhkan waktu ribuan tahun sebelum menemukan cara menikmati teh tanpa terganggu ampas teh dan lebih praktis. Karena baru pada 1908, seorang importir teh asal New York,&nbsp;Thomas Sullivan menemukan dan mengembangkan teh celup (tea bag). Penemuan ini sebenarnya lebih merupakan kebetulan. Sullivan sebagai importir biasa mengirimkan sampel tehnya kepada calon pembeli. Teh saat itu merupakan komoditas sangat mahal sehingga dikemas dalam kaleng logam. Dengan maksud melakukan efisiensi Sullivan mengganti kemasan kaleng untuk sampel teh dengan kantong muslin sutra yang dijahit tangan.</p><p>Tapi rupanya pedagang teh salah mengartikan niat Sullivan melakukan efisiensi. Para pedagang teh mengira ini merupakan cara baru menyajikan minuman teh, yakni menyiram kantung teh itu dengan air panas. Berbagai perusahaan kemudian mengembangkan bentuk dan bahan kantung teh itu, termasuk Lipton yang memperkenalkan teh celup pada 1952.</p><p>Kini teh celup sudah menjadi bagian dari hidup kita. Menjadi cara baru kita menyajikan teh. Teh celup menjanjikan kepraktisan dalam minum teh.</p>",
                "excerpt": "Dari legenda kaisar Tiongkok hingga lahirnya teh celup modern, sejarah teh menunjukkan bagaimana kebiasaan sederhana membentuk budaya minum dunia.",
                "type": "post",
                "status": "publish",
                "slug": "asal-usul-teh",
                "date": "2026-02-01T01:00:00.000Z",
                "modified": "2026-02-01T01:00:00.000Z",
                "author": {
                    "ID": 4,
                    "display_name": "Yosal Iriantara",
                    "user_email": "Yosal.iriantara@gmail.com",
                    "user_nicename": "yosal-iriantara"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Dari legenda kaisar Tiongkok hingga lahirnya teh celup modern, sejarah teh menunjukkan bagaimana kebiasaan sederhana membentuk budaya minum dunia.",
                    "_summary_social": "Dari legenda kaisar Tiongkok hingga lahirnya teh celup modern, sejarah teh menunjukkan bagaimana kebiasaan sederhana membentuk budaya minum dunia.",
                    "_channel": "Cerita Rasa",
                    "_topic": "AsalUsulTeh",
                    "_keyword": "SejarahTeh, TehCelup, SejarahKuliner, BudayaMinumTeh",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "4",
                    "_thumbnail_id": "7579",
                    "_thumbnail_caption": "Sumber Foto: thespruceeats | Teh Celup",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755418693-634346144.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755418693-634346144.jpeg"
                },
                "view_count": 44,
                "views": 44,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769755418693-634346144.jpeg",
                    "caption": "Sumber Foto: thespruceeats | Teh Celup",
                    "id": "7579"
                }
            },
            {
                "id": 7566,
                "title": "Krisis Santan",
                "content": "<p>Jika harga satu komoditas di pasar melonjak tajam, pasti ada apa-apanya. Apalagi jika komoditas itu bukan komoditas pokok, tapi terasa diperlukan kehadirannya. Contohnya santan. Tidak semua masakan membutuhkan santan tapi banyak masakan yang memerlukan santan.</p><p>Malaysia pernah mengalami apa yang di media disebut sebagai krisis santan. Harga santan melonjak tajam. Dari RM 15 (sekitar Rp 64 ribu)/kg menjadi RM 22 (sekitar Rp 94 ribu)/kg. Kini memang harga itu kembali ke sekitar RM 15/kg. Namun ada alarm yang mengingatkan negeri jiran itu, santan bisa saja tiba-tiba naik atau hilang sejenak di pasar. Itu terjadi karena menurunnya pasokan kelapa di pasar Malaysia. Pasokan kelapa Malaysia mengalami penurunan produksi kelapa karena menurunnya luasan lahan kebun kelapa. Selain itu, Indonesia juga mulai membatasi ekspor kelapa ke negara tetangga. Indonesia melakukan hilirisasi kelapa sehingga kelapa tak lagi diekspor gelondongan tapi sudah jadi produk terolah. Padahal Malaysia mengimpor 100 – 150 juta butir kelapa setiap tahunnya.</p><p>Indonesia mengekspor kelapa dan produk kelapa senilai Rp 24 milyar setahun. Nilai ini cukup kecil. Indonesia berniat mengembangkan produk kelapa olahan sehingga diperhitungkan nilai ekspornya bisa naik menjadi Rp 2.400 triliun/tahun. Bukan hanya nilai ekonomisnya yang meningkat, namun juga ada dampak lainnya seperti ketersediaan lapangan kerja di dalam negeri dan membantu menggerakkan ekonomi pedesaan.</p><p>Langkah hilirisasi itu sudah dilakukan. Di Maluku Utara, dengan hilirisasi itu harga kelapa yang semula Rp 600/butir menjadi Rp 3.500. Bahkan nilainya setelah diolah bisa naik menjadi Rp 5 – 6 ribu/butir. Hilirisasi itu akan membuat produk kelapa mulai dari santan sampai air kelapa dalam kemasan.</p><p>Selain itu, pasar santan juga makin meluas. Cina misalnya jadi salah satu pasar penting santan Indonesia. Apalagi kini mulai tumbuh kebiasaan minum kopi santan yang rasanya cocok dengan banyak konsumen di Cina.</p><p>Santan bukan hanya soal komoditas bernilai ekonomis tinggi. Namun juga berkembang karena ada gaya hidup yang dikembangkan di baliknya. Kita mengubah kelapa menjadi santan dengan mengubah gaya hidup dari menjual butiran kelapa menjadi kelapa olahan. Juga ada perubahan dalam cara mengonsumsi santan. Bukan sekedar bumbu penting makanan berkuah tapi juga digunakan untuk kepentingan lain, seperti minum kopi.</p><p>Santan itu tak terlihat perannya namun penting.</p>",
                "excerpt": "Lonjakan harga santan di Malaysia mengungkap rapuhnya rantai pasok kelapa regional. Hilirisasi kelapa Indonesia membuka peluang ekonomi besar.",
                "type": "post",
                "status": "publish",
                "slug": "krisis-santan",
                "date": "2026-01-30T09:00:00.000Z",
                "modified": "2026-01-30T09:00:00.000Z",
                "author": {
                    "ID": 4,
                    "display_name": "Yosal Iriantara",
                    "user_email": "Yosal.iriantara@gmail.com",
                    "user_nicename": "yosal-iriantara"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Lonjakan harga santan di Malaysia mengungkap rapuhnya rantai pasok kelapa regional. Hilirisasi kelapa Indonesia membuka peluang ekonomi besar.",
                    "_summary_social": "Lonjakan harga santan di Malaysia mengungkap rapuhnya rantai pasok kelapa regional. Hilirisasi kelapa Indonesia membuka peluang ekonomi besar.",
                    "_channel": "Cerita Rasa",
                    "_topic": "KrisisSantan",
                    "_keyword": "HilirisasiKelapa, KomoditasPangan, EkonomiPertanian",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "4",
                    "_thumbnail_id": "7565",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769672645443-361257330.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769672645443-361257330.jpeg"
                },
                "view_count": 68,
                "views": 68,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769672645443-361257330.jpeg",
                    "caption": "",
                    "id": "7565"
                }
            },
            {
                "id": 7570,
                "title": "Rebung dan Jalan Pulang Tradisi",
                "content": "<p>Di tengah gempuran wacana pangan sehat yang kian teknokratis, dengan dipenuhi istilah serat, antioksidan, indeks glikemik, rebung tiba-tiba kembali mendapat sorotan. Artikel-artikel kesehatan menyebutnya sebagai bahan pangan rendah kalori, baik bagi pencernaan, bahkan aman bagi ibu hamil jika diolah dengan benar. Data nutrisi pun disajikan rapi.</p><p>Fenomena ini bukan sekadar soal makanan, tapi soal relasi kuasa pengetahuan. Rebung atau iwung dalam bahasa Sunda sejatinya telah lama hidup di dapur-dapur kampung. Ia bukan temuan baru. Yang baru adalah cara kita memandangnya.</p><p>Di balik identitas kuliner yang sudah dikomodifikasi, rumah-rumah makan Sunda yang mempertahankan menu rebung sebagai masakan harian, bukan sebagai tren. Di tempat-tempat ini, rebung hadir dalam gulai sederhana, sayur kuah kuning, atau tumisan dengan bumbu minim. Rasanya pahit-tipis, berserat, dan jujur ia tidak berusaha menyenangkan semua lidah.</p><p>Di sinilah retradisionalisasi bekerja. Tradisi yang sempat dianggap “kampungan” atau kalah pamor dari ayam krispi dan saus instan, sekarang dipanggil kembali. Tapi pemanggilan ini tidak netral. Ia sering datang melalui pintu legitimasi baru seperti sains, gizi, dan gaya hidup sehat kelas menengah. Apa yang dulu dimakan karena kebutuhan dan kedekatan dengan alam, kini dikonsumsi karena alasan kesehatan dan identitas.</p><p>Masalahnya, saat tradisi dihidupkan kembali lewat bahasa modern, ada risiko ia tercerabut dari konteks sosialnya. Pengetahuan lokal tentang cara mengolah rebung, merebus berulang untuk menghilangkan racun alami, memilih tunas yang tepat kerap dipinggirkan. Ia dianggap sekadar “tips”, bukan pengetahuan sah. Padahal, di sanalah letak kearifan yang memungkinkan rebung dikonsumsi aman jauh sebelum jurnal medis membahasnya.</p><p>Ada rumah makan di Sumedang yang dikenal karena rebung sesungguhnya sedang melakukan perlawanan sunyi. Mereka menolak sepenuhnya tunduk pada selera pasar yang seragam. Rebung tidak selalu tersedia setiap hari, ia bergantung musim dan pasokan lokal. Ketidakkonsistenan itu justru menjadi penanda etis bahwa makanan tidak selalu bisa dipaksa mengikuti logika industri.</p><p>Retradisionalisasi, dalam konteks ini, menjadi upaya merebut kembali makna agar tradisi tidak hanya dijadikan estetika atau komoditas.</p><p>Rebung mengingatkan kita bahwa masa depan pangan tidak selalu harus diciptakan dari yang baru. Rebung bukan sekadar sayur, ia adalah arsip hidup tentang bagaimana budaya bertahan, meski berkali-kali hendak disisihkan.</p>",
                "excerpt": "Rebung kembali disorot sebagai pangan sehat, namun di balik legitimasi sains tersimpan cerita retradisionalisasi dan pengetahuan lokal.",
                "type": "post",
                "status": "publish",
                "slug": "rebung-dan-jalan-pulang-tradisi",
                "date": "2026-01-30T04:00:00.000Z",
                "modified": "2026-01-30T04:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Rebung kembali disorot sebagai pangan sehat, namun di balik legitimasi sains tersimpan cerita retradisionalisasi dan pengetahuan lokal.",
                    "_summary_social": "Rebung kembali disorot sebagai pangan sehat, namun di balik legitimasi sains tersimpan cerita retradisionalisasi dan pengetahuan lokal.",
                    "_channel": "Cerita Rasa",
                    "_topic": "Rebung",
                    "_keyword": "PanganTradisional, Retradisionalisasi, KulinerSunda",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7569",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769738811290-289618345.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769738811290-289618345.jpeg"
                },
                "view_count": 18,
                "views": 18,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769738811290-289618345.jpeg",
                    "caption": "",
                    "id": "7569"
                }
            },
            {
                "id": 7532,
                "title": "Nasi Padang Jadi Tempat Pulang di Singapura ",
                "content": "<p>Di kota secepat Singapura, makan sering kali cuma soal mengisi perut. Cepat, efisien, lalu kembali ke rutinitas. Tapi kabar tentang sebuah warung nasi padang yang sudah bertahan 78 tahun dan kini harus tutup, rasanya menyentil lebih dalam. Karena yang akan hilang bukan sekadar satu tempat makan, melainkan satu ruang hidup.</p><p>Warung itu bukan cuma dapur yang sibuk. Ia adalah tempat orang-orang berhenti dari hiruk-pikuk kota. Para pekerja migran, perantau, sampai warga lokal yang sudah puluhan tahun langganan, datang bukan cuma karena rendangnya. Mereka datang karena rasa akrab, karena di sana, bahasa, aroma, dan suasananya terasa lebih dekat dengan rumah.</p><p>Warung seperti ini bekerja sebagai ruang antara bukan rumah, bukan kantor, tapi tempat orang merasa aman menjadi dirinya sendiri. Tempat bercerita soal kerjaan yang berat, rindu kampung halaman, atau sekadar mengeluh soal hidup. Ruang-ruang kecil semacam ini jarang dibicarakan, padahal ia ikut menjaga kesehatan sosial sebuah kota.</p><p>Selama hampir delapan dekade, warung nasi padang ini ikut menyaksikan perubahan zaman. Dari pelanggan yang datang dengan pakaian kerja lusuh, sampai generasi baru yang memotret makanannya sebelum menyantap. Dari obrolan panjang di meja, sampai makan singkat karena waktu istirahat makin sempit. Tapi satu hal yang bertahan, perasaan diterima.</p><p>Sayangnya, kota modern tak selalu ramah pada ruang yang bekerja dengan logika perasaan. Sewa naik, biaya hidup melonjak, selera pasar berubah. Semua dihitung dalam angka. Yang tak bisa diukur adalah kenangan, kebersamaan, rasa pulang yang pelan-pelan dianggap tidak penting. Warung akhirnya kalah, bukan karena sepi makna, tapi karena sistem tak memberi ruang bagi makna itu sendiri.</p><p>Bagi banyak orang, tutupnya warung ini terasa seperti kehilangan teman lama. Tempat yang selalu ada saat hari sedang berat. Tempat yang tidak menuntut apa-apa selain duduk, makan, dan bernapas sebentar. Kehilangan semacam ini jarang masuk berita besar, tapi dampaknya terasa di kehidupan sehari-hari.</p><p>Cerita ini mengingatkan kita bahwa pembangunan bukan cuma soal gedung tinggi dan angka pertumbuhan. Ada ruang-ruang kecil yang menjaga manusia tetap manusia. Dan saat ruang itu hilang, yang ikut pergi bukan cuma sepiring nasi padang, tapi juga rasa pulang. Sesuatu yang sederhana, tapi sangat berarti.</p>",
                "excerpt": "Tutupnya warung nasi padang legendaris di Singapura menandai hilangnya ruang pulang, tempat perantau berbagi rasa, cerita, dan kemanusiaan.",
                "type": "post",
                "status": "publish",
                "slug": "nasi-padang-jadi-tempat-pulang-di-singapura-",
                "date": "2026-01-26T13:00:00.000Z",
                "modified": "2026-01-26T13:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Tutupnya warung nasi padang legendaris di Singapura menandai hilangnya ruang pulang, tempat perantau berbagi rasa, cerita, dan kemanusiaan.",
                    "_summary_social": "Tutupnya warung nasi padang legendaris di Singapura menandai hilangnya ruang pulang, tempat perantau berbagi rasa, cerita, dan kemanusiaan.",
                    "_channel": "Cerita Rasa",
                    "_topic": "NasiPadang",
                    "_keyword": "DiasporaIndonesia, Singapura, RuangSosial, Perantau",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7531",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769428937392-79091253.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769428937392-79091253.jpeg"
                },
                "view_count": 8,
                "views": 8,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Untitled-design-1769428937392-79091253.jpeg",
                    "caption": "",
                    "id": "7531"
                }
            }
        ],
        "pagination": {
            "currentPage": 1,
            "totalPages": 30,
            "totalItems": 179,
            "itemsPerPage": 6
        }
    }
  }
  ```

## Details
- Saat ini kontennya masih statis di page @resources/views/pages/home.blade.php
- line: 258-259 nantinya loop berdasarkan data kategori
- Setiap loop kelipatan 2 akan menambahkan html berikut sebagai iklan google ads:
```html
<div class="bg-blue-100 border border-blue-300 rounded-lg py-8 text-center text-blue-800 text-sm font-medium my-12">AdSense</div>
```
- Konten berita ambil berdasarkan slug kategori