@extends('layouts.app')

@section('content')
<section class="w-full py-8 bg-[#f8fafc]">
    <div class="w-full px-3 sm:px-4 lg:px-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-[30px] sm:text-[38px] font-extrabold text-gray-900">{{ $category }}</h1>
                <p class="mt-2 text-sm sm:text-base text-gray-500">Browse all products in the {{ $category }} category.</p>
            </div>
            <a href="{{ route('home') }}" class="text-[14px] font-semibold text-blue-600">Back to Home</a>
        </div>

        @if($products->isEmpty())
            <div class="rounded-2xl bg-white border border-gray-200 p-8 text-center text-gray-600">
                No products found in this category yet.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="group block bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                        <div class="h-[240px] bg-white flex items-center justify-center p-4 overflow-hidden">
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="px-4 py-4">
                            <p class="text-[13px] font-extrabold text-gray-900">{{ $product->formattedPrice() }}</p>
                            @if($product->old_price)
                                <p class="mt-1 text-[11px] text-gray-400 line-through">{{ $product->formattedOldPrice() }}</p>
                            @endif
                            <h2 class="mt-3 text-[14px] sm:text-[15px] font-semibold text-gray-800">{{ $product->name }}</h2>
                            <p class="mt-2 text-[12px] text-gray-500 line-clamp-2">{{ $product->short_description ?? '' }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
