<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;

echo "Total Products in Database: " . Product::count() . "\n";
echo "Featured Products: " . Product::where('featured', true)->count() . "\n";

$product = Product::first();
if ($product) {
    echo "\nFirst Product:\n";
    echo "Name: {$product->name}\n";
    echo "Slug: {$product->slug}\n";
    echo "Price: {$product->formattedPrice()}\n";
    echo "Category: {$product->category}\n";
}
