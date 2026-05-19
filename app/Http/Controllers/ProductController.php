<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show single product details page.
     */
    public function show(Product $product)
    {
        // Get related products from the same category (excluding current product)
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(6)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category(string $categorySlug)
    {
        $category = collect($this->availableCategories())->first(function ($name) use ($categorySlug) {
            return \Illuminate\Support\Str::slug($name) === $categorySlug;
        });

        if (! $category) {
            abort(404);
        }

        $products = Product::where('category', $category)->get();

        return view('products.category', compact('products', 'category'));
    }

    private function availableCategories(): array
    {
        return [
            'Solar Panels',
            'Inverters',
            'Batteries',
            'Controllers',
            'Solar Lights',
            'Accessories',
        ];
    }
}
