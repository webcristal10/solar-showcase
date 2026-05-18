<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the home page with featured products.
     */
    public function index()
    {
        $heroSlides = [
            ['image' => asset('images/slider/slide-1.jpg')],
            ['image' => asset('images/slider/slide-2.jpg')],
            ['image' => asset('images/slider/slide-3.jpg')],
            ['image' => asset('images/slider/slide-4.jpg')],
            ['image' => asset('images/slider/slide-5.jpg')],
            ['image' => asset('images/slider/slide-6.jpg')],
        ];

        // Get featured products from database
        $featuredProducts = Product::where('featured', true)->limit(6)->get();

        // If no featured products, get all products
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::limit(6)->get();
        }

        $categories = [
            ["name" => "Solar Panels", "image" => "category-1.jpg"],
            ["name" => "Inverters", "image" => "category-2.jpg"],
            ["name" => "Batteries", "image" => "category-3.jpg"],
            ["name" => "Controllers", "image" => "category-4.jpg"],
            ["name" => "Solar Lights", "image" => "category-5.jpg"],
            ["name" => "Accessories", "image" => "category-6.jpg"],
        ];

        return view('pages.home', compact('heroSlides', 'featuredProducts', 'categories'));
    }
}
