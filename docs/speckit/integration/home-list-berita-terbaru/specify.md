# Specify: [Integration] Home List Berita Terbaru

## Purpose
Integrasi endpoint untuk mengambil list berita terbaru

## Base URL
https://api.naramakna.id

## Endpoint yang Digunakan
GET /api/content/feed?limit=7&type=post&mainCategoriesOnly=true

## Request Body
### GET /api/content/feed
Query Parameters:
- limit: integer (optional, default: 7)
- type: string (optional, default: "post")
- mainCategoriesOnly: boolean (optional, default: true)

## Response Body
### GET /api/content/feed
- 200 OK:
  ```json
  {
    "success": true,
    "data": {
        "posts": [
            {
                "id": 7608,
                "title": "Jepang Melawan Drakor dengan Sumo",
                "content": "<p>Di banyak sudut Asia termasuk Indonesia, drama Korea dan serial China telah menjadi bagian dari keseharian. Pop culture bekerja diam-diam, masuk ke rutinitas, lalu tinggal. Jepang tampaknya menyadari itu. Tapi alih-alih ikut berlomba memproduksi cerita yang serupa, mereka justru kembali mengangkat sumo ke panggung dunia.</p><p>Pilihan ini terasa janggal sekaligus menarik. Di saat dunia bergerak cepat, Jepang menawarkan sesuatu yang lambat. Di tengah kisah cinta yang penuh dialog emosional, sumo hadir nyaris tanpa kata. Tak ada plot romantis, tak ada tokoh yang bisa dijadikan idola dengan mudah. Yang ada hanyalah tubuh besar, ritual panjang, dan disiplin hidup yang keras. Tapi justru di situlah pesan itu bekerja.</p><p>Jika drakor dan dracin menjual mimpi tentang kehidupan urban modern seperti apartemen rapi, pakaian modis, relasi yang hangat. Sedangkan sumo menawarkan laku hidup yang nyaris berlawanan. Hidup yang diatur ketat, penuh hierarki, dan tunduk pada tradisi. Jepang seolah ingin berkata, gaya hidup tidak selalu harus ringan dan menyenangkan. Ia juga bisa berat, sunyi, dan penuh pengorbanan.</p><p>Pertarungan ini tidak berlangsung terang-terangan. Tidak ada saling sindir atau klaim superioritas. Tapi di ruang gaya hidup global, pilihan budaya selalu politis. Apa yang kita tonton berulang kali akan terasa wajar. Apa yang jarang kita lihat akan terasa eksotis. Jepang memanfaatkan eksotisme itu bukan sebagai hiburan kosong, tapi sebagai penanda identitas.</p><p>Sumo tidak sedang mencoba menyaingi popularitas K-pop atau drakor. Ia mengambil jalan berbeda, menjadi penanda keunikan. Di tengah budaya populer yang cepat berganti, tradisi dijual sebagai sesuatu yang tahan lama. Sebuah pesan halus bahwa tidak semua hal harus mengikuti selera pasar.</p><p>Meski begitu, ada ironi yang tak bisa diabaikan. Saat sumo dipentaskan ke luar negeri, ia tetap harus dikemas. Ritual dipilih, cerita disederhanakan, sisi-sisi yang terlalu keras disisihkan. Tradisi pun akhirnya ikut bernegosiasi dengan selera global. Ia tidak sepenuhnya bebas.</p><p>Namun mungkin di situlah letak kejujurannya. Tidak ada budaya yang benar-benar murni saat melintasi batas negara. Yang ada hanyalah pilihan, apakah budaya itu larut sepenuhnya dalam arus pop, atau tetap berusaha membawa nilai asalnya.</p><p>Dalam perang sunyi ini, Jepang memilih bertahan dengan caranya sendiri. Tidak dengan teriakan, tidak dengan tren, tapi dengan ketekunan menjaga ritus.</p>",
                "excerpt": "Di tengah dominasi drakor dan dracin, Jepang mengangkat sumo ke panggung global sebagai strategi budaya, identitas, dan perlawanan terhadap arus pop culture.",
                "type": "post",
                "status": "publish",
                "slug": "jepang-melawan-drakor-dengan-sumo",
                "date": "2026-02-02T13:00:00.000Z",
                "modified": "2026-02-02T13:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Di tengah dominasi drakor dan dracin, Jepang mengangkat sumo ke panggung global sebagai strategi budaya, identitas, dan perlawanan terhadap arus pop culture.",
                    "_summary_social": "Di tengah dominasi drakor dan dracin, Jepang mengangkat sumo ke panggung global sebagai strategi budaya, identitas, dan perlawanan terhadap arus pop culture.",
                    "_channel": "Laga & Gaya",
                    "_topic": "BudayaPop",
                    "_keyword": "SumoJepang, PopCultureAsia, IdentitasBudaya, KritikBudaya",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7607",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Desain-tanpa-judul-1770035317165-791748663.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Desain-tanpa-judul-1770035317165-791748663.jpeg"
                },
                "view_count": 17,
                "views": 17,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/02/Desain-tanpa-judul-1770035317165-791748663.jpeg",
                    "caption": "",
                    "id": "7607"
                }
            },
            {
                "id": 7601,
                "title": "Hidup Nyaman, Tapi Berutang",
                "content": "<p>Di banyak negara maju, hidup tampak berjalan rapi. Transportasi datang tepat waktu, ruang kota tertata, taman mudah dijangkau. Dari kejuhan, hidup seperti ini terlihat tenang, bahkan bahagia. Tapi di balik kerapian itu, ada satu hal yang jarang dibicarakan dengan jujur bahwa hidup nyaman ternyata mahal, dan sering kali dibayar dengan utang.</p><p>Data menunjukkan, warga negara maju termasuk yang paling “bahagia” di dunia. Tapi pada saat yang sama, utang rumah tangga mereka juga tinggi. Rumah, pendidikan, kendaraan, sampai liburan semuanya nyaris tak lepas dari cicilan. Utang bukan lagi keadaan darurat, tapi baagian dari gaya hidup sehari-hari.</p><p>Di titik ini, kebahagian terasa seperti sesuatu yang direncanakan, dihitung, dan dicicil. Bukan berarti buruk, tapi juga bukan konsekuensi. Banyak orang merasa hidupnya baik-baik saja kerena kebutuhan dasar terpenuhi dan masa depan terlihat aman. Tapi rasa aman itu berdiri di atas komitmen finansial jangka panjang yang terus meningkat.</p><p>Ada sekitar 35 negara dengan utang rumah tangga tertinggi. Secara struktur, mayoritas utang rumah tangga ini berasal dari kredit pemilik rumah. Saat suku bunga ini naik, beban cicilan juga langsung meningkat, tanpa jeda. Konsumsi jadi variabel pertama yang tertekan.</p><p>Yang menarik, utang di negara maju jarang dipandang sebagai kegagalan. Ia justru dianggap normal, bahkan rasional. Selama cicilan lancar, hidup boleh terus berjalan seperti biasa. Tapi normalisasi ini perlahan menggeser makna kebebasan. Pilihan hidup jadi lebih sempit sedangkan pekerjaan harus stabil, risiko harus ditekan, dan kegagalan nyaris tak diberi ruang.</p><p>Di sinilah gaya hidup modern menunjukkan sisi rapuhnya. Hidup memang nyaman, tapi juga penuh kewajiban. Bahagia, tapi selalu dibayangi jadwal pembayaran. Saat ekonomi goyah atau suku bunga naik, ketenangan itu bisa langsung runtuh lebih cepat dari yang dibanyangkan.</p><p>Cerita ini terasa dekat, bahkan bagi kita yang tinggal jauh dari negara maju. Gaya hidup global perlahan masuk, rumah ideal, pendidikan mahal, standar “hidup layak” yang terus-terusan naik. Semua ini tampak masuk akal sampai kita sadar bahwa banyak mimpi hari ini dibayar dengan kecemasan esok hari.</p>",
                "excerpt": "Di balik kenyamanan hidup negara maju, utang rumah tangga tinggi menjadi fondasi rapuh. Gaya hidup modern kerap dibayar dengan cicilan dan kecemasan finansial.",
                "type": "post",
                "status": "publish",
                "slug": "hidup-nyaman-tapi-berutang",
                "date": "2026-02-02T10:00:00.000Z",
                "modified": "2026-02-02T10:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Di balik kenyamanan hidup negara maju, utang rumah tangga tinggi menjadi fondasi rapuh. Gaya hidup modern kerap dibayar dengan cicilan dan kecemasan finansial.",
                    "_summary_social": "Di balik kenyamanan hidup negara maju, utang rumah tangga tinggi menjadi fondasi rapuh. Gaya hidup modern kerap dibayar dengan cicilan dan kecemasan finansial.",
                    "_channel": "Laga & Gaya",
                    "_topic": "GayaHidupModern",
                    "_keyword": "UtangRumahTangga EkonomiGlobal, RefleksiSosial",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7600",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1770008572539-15068123.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1770008572539-15068123.jpeg"
                },
                "view_count": 13,
                "views": 13,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1770008572539-15068123.jpeg",
                    "caption": "",
                    "id": "7600"
                }
            },
            {
                "id": 7584,
                "title": "Bersatu Kita Teguh, Bercerai Kita Runtuh",
                "content": "<p>Peribahasa kita menyatakan, “bersatu kita teguh, bercerai kita runtuh”. Namun banyak orang rupanya memilih jalan untuk runtuh ketimbang menjadi teguh. Berdasarkan data BPS, pada 2020, ada 291.677 kasus perceraian. Angka ini naik pada 2021 menjadi 447.743 kasus, dan puncaknya pada 2022 dengan 516.344 kasus. Namun mulai tahun 2023 dan 2024, angka itu sedikit menurun menjadi 463.654 kasus pada tahun 2023 dan 394.608 kasus pada 2024. Hal yang menarik, percerai itu banyak yang “diinisiasi” oleh istri yang menggugat cerai suaminya yang jumlahnya pada tahun 2024 mencapai 308.956, sedangkan cerai karena suami menjatuhkan talak 85.652 kasus.</p><p>Namun perceraian tentu lebih dari sekedar angka statistik. Setiap perceraian memiliki kisah kemanusiaannya masing-masing. Jika ada 1.000 kasus perceraian berarti akan ada 1.000 kisah kemanusiaan. Bisa kisah soal penyebab perceraian, kisah hubungan manusia yang terputus dan aneka kisah-kisah lainnya yang tentu akan menyentuh perasaan manusia.</p><p>Memang kita bisa membuat kategori untuk melihat pola umum penyebab perceraian. Namun sejatinya, perceraian itu memiliki kisahnya masing-masing. Kisah yang tentu menyakitkan dan biasanya diakhiri dengan ajakan yang seperti bijak yaitu “untuk mengambil hikmah dari kisah ini”.</p><p>Secara kategoris, biasanya ditemukan pola 4 penyebab perceraian. Pertama, karena masalah ekonomi keluarga. Kemiskinan dan ketidakmampuan secara finansial sering menjadi penyebab kandasnya kehidupan rumah tangga, meski setelah bercerai pun akhirnya terjebak dalam bentuk baru tekanan ekonomi. Kedua, kehidupan rumah tangganya penuh dengan pertengkaran dan konflik. Tidak ada komunikasi yang baik di antara pasangan dan yang ada adalah menang-menangan antara suami dan istri dalam berkomunikasi. Ketiga perselingkuhan, yang banyak terjadi dalam berbagai bentuknya. Keempat, kurangnya edukasi pernikahan, sehingga kesiapan membina rumah tangganya minim.</p><p>Namun, sekali lagi, itu hanya kategori-kategori yang dibuat untuk mengetahui pola penyebab perceraian. Sayangnya, manusia itu meski tahu penyebab belum tentu dapat mengembalikan akibat. Bahkan kemampuan mengendalikan penyebab pun tidak dengan sendirinya membuat manusia mampu mengendalikan akibat agar akibat sejalan dengan kehendaknya.</p><p>Akhirnya, ada orang yang memilih bercerai meski harus “runtuh” ketimbang bersatu yang ternyata tidak membuat kita “teguh”. Kisah manusia dan kemanusiaan memang selalu unik.</p>",
                "excerpt": "Lonjakan angka perceraian di Indonesia menunjukkan bahwa perpisahan bukan sekadar statistik, melainkan kisah kemanusiaa.",
                "type": "post",
                "status": "publish",
                "slug": "bersatu-kita-teguh-bercerai-kita-runtuh",
                "date": "2026-02-02T06:00:00.000Z",
                "modified": "2026-02-02T06:00:00.000Z",
                "author": {
                    "ID": 4,
                    "display_name": "Yosal Iriantara",
                    "user_email": "Yosal.iriantara@gmail.com",
                    "user_nicename": "yosal-iriantara"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Lonjakan angka perceraian di Indonesia menunjukkan bahwa perpisahan bukan sekadar statistik, melainkan kisah kemanusiaa.",
                    "_summary_social": "Lonjakan angka perceraian di Indonesia menunjukkan bahwa perpisahan bukan sekadar statistik, melainkan kisah kemanusiaa.",
                    "_channel": "Narapandang ",
                    "_topic": "Perceraian",
                    "_keyword": "KeluargaIndonesia, DataBPS, SosiologiKeluarga, RelasiKemanusiaan",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "4",
                    "_thumbnail_id": "7583",
                    "_thumbnail_caption": " Sumber Foto: muisulsel | Bercerai yang menjadi ujung pernikahan",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769756352962-802095945.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769756352962-802095945.jpeg"
                },
                "view_count": 29,
                "views": 29,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/01/Desain-tanpa-judul-1769756352962-802095945.jpeg",
                    "caption": " Sumber Foto: muisulsel | Bercerai yang menjadi ujung pernikahan",
                    "id": "7583"
                }
            },
            {
                "id": 7599,
                "title": "Ketika Gelar Akademik Tak Lagi Menjanjikan Apa-Apa",
                "content": "<p>Di banyak rumah di Indonesia, wisuda masih dirayakan seperti kemenangan besar. Orang tua tersenyum bangga, foto toga dipajang di ruang tamu, dan satu harapan diam-diam dititipkan “setelah ini, hidup akan lebih mudah”. Gelar akademik dipercaya sebagai tiket keluar dari kesulitan ekonomi, sekaligus bukti bahwa pengorbanan bertahun-tahun tidak sia-sia.</p><p>Tapi realitas hari ini sering berkata sebaliknya. Semakin banyak lulusan perguruan tinggi, semakin panjang pula antrean pencari kerja. Gelar sarjana, magister, bahkan doktor, tak otomatis menjamin pekerjaan layak. Dari sini muncul pertanyaan, sebenarnya apa yang sedang salah?</p><p>Masalahnya tidak sesederhana “kurang skill” atau “salah jurusan”. Dari sini terlihat melemahnya daya tawar gelar akademik adalah hasil dari sistem yang bekerja secara struktural. Pendidikan tinggi makin lama makin dekat dengan logika pasar. Kampus menjual harapan, sementara dunia kerja hanya menyediakan sedikit ruang aman.</p><p>Sosiolog Randall Collins menyebut ini sebagai credential inflation. Saat hampir semua orang punya gelar, ijazah kehilangan keistimewaannya. Ia berubah jadi syarat administratif belaka, bukan lagi penanda kualitas berpikir. Pasar kerja kemudian memilih bukan yang paling kritis atau berpengetahuan, tapi yang paling fleksibel, murah, dan siap lembur tanpa banyak tanya.</p><p>Yang paling terasa dampaknya adalah lulusan dari keluarga biasa. Mereka kuliah dengan biaya yang tidak kecil, membawa ekspektasi orang tua, lalu berhadapan dengan kenyataan kerja kontrak, upah pas-pasan, atau ekonomi gig yang serba tidak pasti. Gelar akademik tidak runtuh, tapi harapan di sekitarnya perlahan rontok.</p><p>Pendidikan pun kehilangan sebagian fungsinya sebagai ruang pembebasan. Michael W. Apple pernah mengingatkan bahwa pendidikan selalu terkait relasi kuasa. Saat kampus lebih sibuk mengejar akreditasi dan daya saing pasar, mahasiswa sering lupa bertanya, untuk siapa semua ini? Untuk pengetahuan, atau sekadar agar cepat terserap industri?</p><p>Maka yang kehilangan “taring” bukan gelar akademik itu sendiri. Yang melemah adalah janji besar bahwa pendidikan pasti membawa hidup yang lebih adil. Selama pasar kerja tetap timpang dan negara absen menjamin kerja layak, gelar hanya akan jadi simbol yang dipakai saat wisuda, tapi tak selalu berguna saat hidup benar-benar dimulai.</p><p>Di titik ini, mungkin kita perlu berhenti menuntut individu agar terus menyesuaikan diri, dan mulai bertanya lebih keras tentang sistem seperti apa yang sedang kita rawat bersama?</p>",
                "excerpt": "Gelar akademik kian kehilangan daya tawar di pasar kerja. Fenomena credential inflation menunjukkan krisis janji pendidikan di tengah ketimpangan sistemik.",
                "type": "post",
                "status": "publish",
                "slug": "ketika-gelar-akademik-tak-lagi-menjanjikan-apa-apa",
                "date": "2026-02-02T04:00:00.000Z",
                "modified": "2026-02-02T04:00:00.000Z",
                "author": {
                    "ID": 5,
                    "display_name": "Khaerunnisa",
                    "user_email": "nissakhaerun49@gmail.com",
                    "user_nicename": "khaerunnisa"
                },
                "categories": [],
                "metadata": {
                    "_aioseo_description": "Gelar akademik kian kehilangan daya tawar di pasar kerja. Fenomena credential inflation menunjukkan krisis janji pendidikan di tengah ketimpangan sistemik.",
                    "_summary_social": "Gelar akademik kian kehilangan daya tawar di pasar kerja. Fenomena credential inflation menunjukkan krisis janji pendidikan di tengah ketimpangan sistemik.",
                    "_channel": "Horison ",
                    "_topic": "Pendidikan",
                    "_keyword": "GelarAkademik, PasarKerja, SarjanaNganggur, KetimpanganSosial",
                    "_location": "",
                    "_mark_as_18_plus": "0",
                    "_edit_last": "5",
                    "_thumbnail_id": "7598",
                    "_thumbnail_caption": "",
                    "_image_captions": "{}",
                    "thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769997852588-527157988.jpeg",
                    "_thumbnail_url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769997852588-527157988.jpeg"
                },
                "view_count": 32,
                "views": 32,
                "image_captions": {},
                "featured_image": {
                    "url": "https://api.naramakna.id/uploads/2026/02/Untitled-design-1769997852588-527157988.jpeg",
                    "caption": "",
                    "id": "7598"
                }
            }
        ],
        "pagination": {
            "currentPage": 1,
            "totalPages": 421,
            "totalItems": 1682,
            "itemsPerPage": 4
        }
    }
  }
  ```

## Details
- Saat ini kontennya masih statis di page @resources/views/pages/home.blade.php
- line: 5-95 integration home list berita terbaru
- Konsepnya SSR (Server Side Rendering)
- Alur: Controller → Call External API → return view(blade)
- 3 data untuk carousel
- 4 data untuk di listnya