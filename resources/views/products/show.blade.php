@extends('layouts.app')

@section('content')

<!-- BREADCRUMB -->
<div class="w-full bg-gray-50 border-b border-gray-200">
    <div class="w-full px-3 sm:px-4 lg:px-6 py-4">
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <a href="/" class="text-blue-600 hover:underline">Home</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-600">{{ $product->category }}</span>
            <span class="text-gray-400">/</span>
            <span class="font-semibold text-gray-900">{{ $product->name }}</span>
        </div>
    </div>
</div>

<!-- PRODUCT DETAILS SECTION -->
<section class="w-full py-8 sm:py-12 lg:py-16 bg-white">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

            <!-- PRODUCT IMAGE -->
            <div class="flex items-center justify-center">
                <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100 shadow-lg group">
                    <img src="{{ asset('images/products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-contain p-8 transition-transform duration-500 group-hover:scale-110">

                    @if($product->discountPercentage())
                        <div class="absolute top-6 right-6 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-lg shadow-lg">
                            <span>-{{ $product->discountPercentage() }}%</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- PRODUCT INFO -->
            <div class="flex flex-col justify-start">
                <!-- CATEGORY & RATING -->
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">{{ $product->category }}</span>
                    <span class="text-yellow-400 text-sm">⭐ ⭐ ⭐ ⭐ ⭐</span>
                </div>

                <!-- PRODUCT NAME -->
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-3 leading-tight">{{ $product->name }}</h1>

                <!-- SHORT DESCRIPTION -->
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">{{ $product->short_description }}</p>

                <!-- PRICE SECTION -->
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-baseline gap-3 mb-3">
                        <span class="text-4xl font-extrabold text-green-600">{{ $product->formattedPrice() }}</span>
                        @if($product->old_price)
                            <span class="text-xl text-gray-400 line-through">{{ $product->formattedOldPrice() }}</span>
                            <span class="inline-flex px-3 py-1 rounded-lg bg-green-100 text-green-700 text-sm font-bold">Save {{ $product->formattedOldPrice() }} - {{ $product->discountPercentage() }}%</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500">✓ Premium Quality | ✓ Genuine Product | ✓ Warranty Included</p>
                </div>

                <!-- SPECIFICATIONS -->
                @if($product->specifications && count($product->specifications) > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-extrabold text-gray-900 mb-4">Key Specifications</h3>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($product->specifications as $key => $value)
                                <div class="bg-gray-50 rounded-lg p-3 border border-gray-200">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</p>
                                    <p class="text-sm font-bold text-gray-900">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- CTA BUTTONS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                    <a href="tel:01926914445"
                       class="flex items-center justify-center gap-2 h-14 rounded-xl bg-blue-600 text-white font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-blue-700">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1C10.61 21 3 13.39 3 4c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.24.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        Call Now
                    </a>
                    <a href="https://wa.me/8801926914445?text=Hi%20I%20am%20interested%20in%20{{ urlencode($product->name) }}"
                       class="flex items-center justify-center gap-2 h-14 rounded-xl bg-green-500 text-white font-bold text-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-green-600">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004c-1.584 0-3.088.462-4.409 1.338l-.316.187-.327.054c-1.092.167-2.151.526-3.09 1.062L2.97 5.368c1.434-1.393 3.373-2.213 5.514-2.213 4.614 0 8.352 3.737 8.352 8.352 0 1.089-.208 2.133-.599 3.117l-.198.395.046.333c.152 1.11.397 2.19.733 3.237L6.97 21.03c-1.393-1.434-2.213-3.373-2.213-5.514 0-4.613 3.737-8.352 8.352-8.352z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>

                <!-- CONTACT FORM LINK -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4">
                    <p class="text-sm text-gray-700 mb-3">
                        <strong class="text-gray-900">Not sure?</strong> Fill out our inquiry form and our team will provide customized recommendations.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                        Fill Inquiry Form →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FULL DESCRIPTION SECTION -->
@if($product->description)
    <section class="w-full py-8 sm:py-12 lg:py-16 bg-gray-50 border-t border-gray-200">
        <div class="w-full px-3 sm:px-4 lg:px-6">
            <div class="max-w-4xl">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-6">Product Details</h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        </div>
    </section>
@endif

<!-- RELATED PRODUCTS SECTION -->
@if($relatedProducts->count() > 0)
    <section class="w-full py-8 sm:py-12 lg:py-16 bg-white border-t border-gray-200">
        <div class="w-full px-3 sm:px-4 lg:px-6">
            <div class="mb-8">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">Similar Products</h2>
                <p class="text-gray-600">Explore other premium solar products in the {{ $product->category }} category</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                @foreach($relatedProducts as $relatedProduct)
                    <a href="{{ route('products.show', $relatedProduct) }}" class="group">
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                            <div class="aspect-square bg-gray-50 overflow-hidden flex items-center justify-center p-3">
                                <img src="{{ asset('images/products/' . $relatedProduct->image) }}"
                                     alt="{{ $relatedProduct->name }}"
                                     class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                            </div>
                            <div class="p-2">
                                <p class="text-xs font-bold text-gray-900">{{ $relatedProduct->formattedPrice() }}</p>
                                <p class="text-xs text-gray-500 line-clamp-2 mt-1">{{ $relatedProduct->name }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- INQUIRY CTA SECTION -->
<section class="w-full py-8 sm:py-12 lg:py-16 bg-gradient-to-br from-[#203B32] via-[#1b332b] to-[#111827]">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Need More Information?</h2>
            <p class="text-lg text-gray-300 mb-8">
                Our solar experts are ready to help you find the perfect solution for your energy needs. Contact us today for a free consultation.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="tel:01926914445"
                   class="inline-flex items-center justify-center gap-2 h-12 px-6 rounded-xl bg-white text-[#203B32] font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                    📞 Call Expert Team
                </a>
                <a href="https://wa.me/8801926914445?text=Hi%20I%20need%20solar%20consultation"
                   class="inline-flex items-center justify-center gap-2 h-12 px-6 rounded-xl bg-[#DBFF59] text-[#203B32] font-bold shadow-lg hover:shadow-xl transition-all duration-300">
                    💬 WhatsApp Inquiry
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
