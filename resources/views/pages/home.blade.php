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
                        @forelse($featuredProducts as $product)
                            <a href="{{ route('products.show', $product) }}" class="border border-gray-200 rounded-md overflow-hidden bg-white hover:shadow-lg transition duration-300 cursor-pointer group">
                                <div class="h-[160px] sm:h-[180px] lg:h-[175px] bg-white flex items-center justify-center p-2 relative overflow-hidden">
                                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain transition-transform duration-300 group-hover:scale-110">
                                    @if($product->discountPercentage())
                                        <div class="absolute top-1 right-1 bg-red-500 text-white rounded text-[10px] font-bold px-1.5 py-0.5">
                                            -{{ $product->discountPercentage() }}%
                                        </div>
                                    @endif
                                </div>
                                <div class="px-2 pb-3">
                                    <p class="text-[13px] font-extrabold text-gray-900 leading-none">{{ $product->formattedPrice() }}</p>
                                    @if($product->old_price)
                                        <p class="mt-1 text-[11px] text-gray-400 line-through leading-none">{{ $product->formattedOldPrice() }}</p>
                                    @endif
                                    <h4 class="mt-2 text-[12px] leading-[1.25] text-gray-700 h-[45px] overflow-hidden">{{ $product->name }}</h4>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-3 text-center text-gray-500 py-4">No products available</div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="w-full py-5 bg-white">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-[19px] sm:text-[22px] font-bold text-gray-900">Shop By Category</h2>
            <a href="#" class="text-[13px] font-semibold text-blue-600">See More →</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 sm:gap-3">
            @foreach($categories as $category)
                <a href="{{ route('products.category', ['category' => \Illuminate\Support\Str::slug($category['name'])]) }}" class="block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="aspect-square bg-gray-50 overflow-hidden">
                        <img src="{{ asset('images/categories/' . $category['image']) }}" alt="{{ $category['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-2 text-center">
                        <h3 class="text-[13px] sm:text-[14px] font-medium text-gray-800">{{ $category['name'] }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>


<section class="w-full py-10 sm:py-14 bg-white"><div class="w-full px-3 sm:px-4 lg:px-6"><div class="rounded-[28px] bg-gradient-to-br from-[#203B32] via-[#1b332b] to-[#111827] overflow-hidden"><div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center p-6 sm:p-8 lg:p-12"><div><span class="inline-flex mb-4 px-4 py-2 rounded-full bg-[#DBFF59]/15 text-[#DBFF59] text-[13px] font-bold">⚡ Premium Solar Inverter</span><h2 class="text-[34px] sm:text-[46px] lg:text-[58px] font-extrabold leading-[1.03] text-white">Smart Power Backup For Home & Business</h2><p class="mt-5 text-[15px] sm:text-[17px] leading-[1.9] text-gray-300 max-w-[650px]">High-efficiency solar inverter solutions designed for stable electricity backup, lower power bills, battery protection, and long-lasting performance.</p><div class="mt-7 flex flex-wrap gap-3"><a href="#" class="h-12 px-7 rounded-xl bg-[#DBFF59] text-[#203B32] font-extrabold inline-flex items-center justify-center">Explore Inverters</a><a href="#" class="h-12 px-7 rounded-xl bg-white/10 border border-white/15 text-white font-bold inline-flex items-center justify-center">Get Free Consultation</a></div></div><div class="grid grid-cols-2 gap-3"><div class="rounded-2xl bg-white/10 border border-white/10 p-5"><h3 class="text-[30px] font-extrabold text-[#DBFF59]">99%</h3><p class="mt-1 text-sm text-gray-300">Energy conversion efficiency</p></div><div class="rounded-2xl bg-white/10 border border-white/10 p-5"><h3 class="text-[30px] font-extrabold text-[#DBFF59]">24/7</h3><p class="mt-1 text-sm text-gray-300">Reliable backup support</p></div><div class="rounded-2xl bg-white/10 border border-white/10 p-5"><h3 class="text-[30px] font-extrabold text-[#DBFF59]">5 Years</h3><p class="mt-1 text-sm text-gray-300">Long-term warranty</p></div><div class="rounded-2xl bg-white/10 border border-white/10 p-5"><h3 class="text-[30px] font-extrabold text-[#DBFF59]">Smart</h3><p class="mt-1 text-sm text-gray-300">Battery management</p></div></div></div></div></div></section><script>
    const heroSlider = document.getElementById('heroSlider');
    document.getElementById('heroNext')?.addEventListener('click', () => heroSlider.scrollBy({ left: 320, behavior: 'smooth' }));
    document.getElementById('heroPrev')?.addEventListener('click', () => heroSlider.scrollBy({ left: -320, behavior: 'smooth' }));
</script>

@endsection



