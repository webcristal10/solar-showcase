@extends('layouts.app')

@section('content')

<section class="w-full bg-white pt-4 pb-5 overflow-hidden">
    <div class="relative w-full px-3 sm:px-4 lg:px-6">
        <div id="heroSlider" class="flex gap-3 sm:gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
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
                        <img src="{{ $slide['image'] }}" alt="Solar showcase" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                </div>
            @endforeach
        </div>

        <button id="heroPrev" class="absolute left-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 shadow-md flex items-center justify-center text-xl text-black">❮</button>
        <button id="heroNext" class="absolute right-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 shadow-md flex items-center justify-center text-xl text-black">❯</button>
    </div>
</section>

<section class="w-full py-5 bg-white">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-[19px] sm:text-[22px] font-bold text-gray-900">Shop By Category</h2>
            <a href="#" class="text-[13px] font-semibold text-blue-600">See More →</a>
        </div>

        @php
            $categories = [
                ["name" => "Solar Panels", "image" => "category-1.jpg"],
                ["name" => "Inverters", "image" => "category-2.jpg"],
                ["name" => "Batteries", "image" => "category-3.jpg"],
                ["name" => "Controllers", "image" => "category-4.jpg"],
                ["name" => "Solar Lights", "image" => "category-5.jpg"],
                ["name" => "Accessories", "image" => "category-6.jpg"],
            ];
        @endphp

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 sm:gap-3">
            @foreach($categories as $category)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="aspect-square bg-gray-50 overflow-hidden">
                        <img src="{{ asset('images/categories/' . $category['image']) }}" alt="{{ $category['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-2 text-center">
                        <h3 class="text-[13px] sm:text-[14px] font-medium text-gray-800">{{ $category['name'] }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="w-full py-8 bg-[#f8fafc]">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="text-center mb-7">
            <h2 class="text-[30px] sm:text-[38px] font-extrabold text-gray-900 leading-tight">Solar & green energy</h2>
            <p class="mt-2 text-sm sm:text-base text-gray-500">Products from <span class="text-blue-600">solar & wind energy</span> and its subcategories.</p>
        </div>

        @php
            $groups = [
                ['title' => 'Most Sold Items', 'icon' => '🔥'],
                ['title' => 'Most Discount', 'icon' => '🏷️'],
                ['title' => 'New Coming', 'icon' => '⭐'],
            ];

            $products = [
                ["name" => "Mono Solar Panel 550W", "price" => "BDT18,500.00", "old" => "BDT22,000.00", "image" => "product-1.jpg"],
                ["name" => "Hybrid Solar Inverter", "price" => "BDT32,000.00", "old" => "BDT35,000.00", "image" => "product-2.jpg"],
                ["name" => "Tubular Solar Battery", "price" => "BDT24,500.00", "old" => "BDT27,000.00", "image" => "product-3.jpg"],
                ["name" => "Solar Street Light", "price" => "BDT6,800.00", "old" => "BDT8,000.00", "image" => "product-4.jpg"],
                ["name" => "MPPT Controller", "price" => "BDT7,500.00", "old" => "BDT9,000.00", "image" => "product-5.jpg"],
                ["name" => "Solar Mount Kit", "price" => "BDT2,700.00", "old" => "BDT4,000.00", "image" => "product-1.jpg"],
            ];
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            @foreach($groups as $group)
                <div class="bg-white border border-gray-200 rounded-xl p-3 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-[18px] font-extrabold text-gray-900 flex items-center gap-2">
                            <span>{{ $group['icon'] }}</span> {{ $group['title'] }}
                        </h3>
                        <a href="#" class="text-[13px] font-semibold text-blue-600">See More →</a>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        @foreach($products as $product)
                            <div class="border border-gray-200 rounded-md overflow-hidden bg-white hover:shadow-sm transition">
                                <div class="h-[160px] sm:h-[180px] lg:h-[175px] bg-white flex items-center justify-center p-2">
                                    <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}" class="max-w-full max-h-full object-contain">
                                </div>
                                <div class="px-2 pb-3">
                                    <p class="text-[13px] font-extrabold text-gray-900 leading-none">{{ $product['price'] }}</p>
                                    <p class="mt-1 text-[12px] text-gray-400 line-through leading-none">{{ $product['old'] }}</p>
                                    <h4 class="mt-2 text-[12px] leading-[1.25] text-gray-700 h-[45px] overflow-hidden">{{ $product['name'] }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    const heroSlider = document.getElementById('heroSlider');
    document.getElementById('heroNext')?.addEventListener('click', () => heroSlider.scrollBy({ left: 320, behavior: 'smooth' }));
    document.getElementById('heroPrev')?.addEventListener('click', () => heroSlider.scrollBy({ left: -320, behavior: 'smooth' }));
</script>

@endsection
