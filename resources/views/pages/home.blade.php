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

@endsection
