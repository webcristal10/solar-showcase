@extends('layouts.app')

@section('content')

<section class="w-full bg-white pt-4 pb-5 overflow-hidden">
    <div class="relative w-full px-3 sm:px-4 lg:px-6">

        <div id="heroSlider"
            class="flex gap-3 sm:gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2
                   [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

            @php
                $heroSlides = [
                    ['image' => asset('images/slider/slide-1.jpg')],
                    ['image' => asset('images/slider/slide-2.jpg')],
                    ['image' => asset('images/slider/slide-3.jpg')],
                    ['image' => asset('images/slider/slide-4.jpg')],
                    ['image' => asset('images/slider/slide-5.jpg')],
                    ['image' => asset('images/slider/slide-6.jpg')],
                ];
            @endphp

            @foreach($heroSlides as $slide)
                <div class="snap-start shrink-0 w-[78%] sm:w-[42%] lg:w-[17.2%]">
                    <div class="relative h-[220px] sm:h-[290px] lg:h-[360px] rounded-xl overflow-hidden bg-gray-100 shadow-sm">
                        <img
                            src="{{ $slide['image'] }}"
                            alt="Solar showcase"
                            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                        >
                    </div>
                </div>
            @endforeach

        </div>

        <button id="heroPrev"
            class="absolute left-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 backdrop-blur shadow-md flex items-center justify-center text-xl text-black hover:scale-105 transition">
            ❮
        </button>

        <button id="heroNext"
            class="absolute right-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 backdrop-blur shadow-md flex items-center justify-center text-xl text-black hover:scale-105 transition">
            ❯
        </button>

    </div>
</section>

<script>
    const heroSlider = document.getElementById('heroSlider');

    document.getElementById('heroNext')?.addEventListener('click', () => {
        heroSlider.scrollBy({ left: 320, behavior: 'smooth' });
    });

    document.getElementById('heroPrev')?.addEventListener('click', () => {
        heroSlider.scrollBy({ left: -320, behavior: 'smooth' });
    });
</script>

<section class="w-full py-6 sm:py-8 bg-white">
    <div class="w-full px-3 sm:px-4 lg:px-6">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-[20px] sm:text-[24px] font-bold text-[var(--dark-color)]">
                Shop By Category
            </h2>

            <a href="#"
               class="text-sm font-medium text-[var(--primary-color)] hover:text-[var(--accent-color)] transition">
                View All
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">

            @php
                $categories = [
                    ["name" => "Solar Panels", "image" => "category-1.jpg"],
                    ["name" => "Inverters", "image" => "category-2.jpg"],
                    ["name" => "Batteries", "image" => "category-3.jpg"],
                    ["name" => "Charge Controllers", "image" => "category-4.jpg"],
                    ["name" => "Solar Lights", "image" => "category-5.jpg"],
                    ["name" => "Accessories", "image" => "category-6.jpg"],
                ];
            @endphp

            @foreach($categories as $category)
                <a href="#"
                   class="group bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">

                    <div class="aspect-square overflow-hidden bg-gray-100">
                        <img
                            src="{{ asset("images/categories/" . $category["image"]) }}"
                            alt="{{ $category["name"] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                        >
                    </div>

                    <div class="px-3 py-3 text-center">
                        <h3 class="text-sm sm:text-[15px] font-semibold text-gray-800 group-hover:text-[var(--primary-color)] transition">
                            {{ $category["name"] }}
                        </h3>
                    </div>

                </a>
            @endforeach

        </div>

    </div>
</section>

@endsection


