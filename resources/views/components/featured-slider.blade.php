@props([
    'images' => [],
    'titles' => [],
    'authors' => [],
    'dates' => [],
    'category' => 'Horison'
])

<div class="relative rounded-2xl overflow-hidden bg-white">
    <div class="flex h-[300px] sm:h-[380px] lg:h-[420px] transition-transform duration-500 ease" id="featuredSliderContainer">
        @foreach($images as $index => $image)
            <img src="{{ $image }}" alt="Unggulan {{ $index + 1 }}" class="min-w-full h-full object-cover">
        @endforeach
    </div>
    <span class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">{{ $category }}</span>
    <button class="absolute top-1/2 -translate-y-1/2 left-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
        <span onclick="featuredPrev()">‹</span>
    </button>
    <button class="absolute top-1/2 -translate-y-1/2 right-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
        <span onclick="featuredNext()">›</span>
    </button>
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="featuredDots"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent pointer-events-none"></div>
    <div class="absolute left-4 right-4 bottom-16 text-white">
        <h3 id="featuredTitle" class="text-xl sm:text-2xl font-bold">{{ $titles[0] ?? '' }}</h3>
        <div class="flex gap-3 items-center text-white/80 text-sm mt-2">
            <span id="featuredAuthor">{{ $authors[0] ?? '' }}</span>
            <span class="w-2 h-2 bg-white/50 rounded-full"></span>
            <span id="featuredDate">{{ $dates[0] ?? '' }}</span>
        </div>
    </div>
</div>

<script>
    @verbatim
    let featuredCurrentIndex = 0;
    const featuredImages = document.querySelectorAll('#featuredSliderContainer img');
    const featuredTitles = @js($titles ?? []);
    const featuredAuthors = @js($authors ?? []);
    const featuredDates = @js($dates ?? []);

    // Create dots
    const dotsContainer = document.getElementById('featuredDots');
    featuredImages.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.className = `w-2 h-2 rounded-full cursor-pointer transition-all ${index === 0 ? 'bg-white w-6' : 'bg-white/50'}`;
        dot.onclick = () => goToSlideFeatured(index);
        dotsContainer.appendChild(dot);
    });

    function updateSliderFeatured() {
        const container = document.getElementById('featuredSliderContainer');
        container.style.transform = `translateX(-${featuredCurrentIndex * 100}%)`;

        // Update title
        document.getElementById('featuredTitle').textContent = featuredTitles[featuredCurrentIndex];
        document.getElementById('featuredAuthor').textContent = featuredAuthors[featuredCurrentIndex];
        document.getElementById('featuredDate').textContent = featuredDates[featuredCurrentIndex];

        // Update dots
        const dots = dotsContainer.children;
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = `w-2 h-2 rounded-full cursor-pointer transition-all ${i === featuredCurrentIndex ? 'bg-white w-6' : 'bg-white/50'}`;
        }
    }

    function goToSlideFeatured(index) {
        featuredCurrentIndex = index;
        updateSliderFeatured();
    }

    function featuredNext() {
        featuredCurrentIndex = (featuredCurrentIndex + 1) % featuredImages.length;
        updateSliderFeatured();
    }

    function featuredPrev() {
        featuredCurrentIndex = (featuredCurrentIndex - 1 + featuredImages.length) % featuredImages.length;
        updateSliderFeatured();
    }

    // Auto slide
    setInterval(featuredNext, 5000);
    @endverbatim
</script>
