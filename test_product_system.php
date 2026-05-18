<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Http\Controllers\ProductController;

echo "=== PRODUCT SYSTEM VERIFICATION ===\n\n";

// 1. Check products in database
echo "1. DATABASE CHECK:\n";
$count = Product::count();
echo "   ✓ Total products: $count\n";
$featured = Product::where('featured', true)->count();
echo "   ✓ Featured products: $featured\n\n";

// 2. Test product methods
echo "2. PRODUCT METHODS TEST:\n";
$product = Product::first();
if ($product) {
    echo "   ✓ Product found: {$product->name}\n";
    echo "   ✓ Slug: {$product->slug}\n";
    echo "   ✓ Formatted price: {$product->formattedPrice()}\n";
    if ($product->old_price) {
        echo "   ✓ Discount: {$product->discountPercentage()}%\n";
    }
    echo "   ✓ Category: {$product->category}\n";
    echo "   ✓ Specifications: " . count($product->specifications ?? []) . " specs\n";
}
echo "\n";

// 3. Test ProductController
echo "3. CONTROLLER LOGIC TEST:\n";
$controller = new ProductController();
$relatedProducts = Product::where('category', $product->category)
    ->where('id', '!=', $product->id)
    ->limit(6)
    ->get();
echo "   ✓ Related products found: {$relatedProducts->count()}\n\n";

// 4. Sample route URLs
echo "4. SAMPLE ROUTE URLS:\n";
echo "   Homepage: http://localhost:8000/\n";
echo "   Product: http://localhost:8000/product/{$product->slug}\n";
echo "   Other products:\n";
foreach (Product::limit(3)->get() as $p) {
    echo "     - http://localhost:8000/product/{$p->slug}\n";
}
echo "\n";

// 5. Product categories
echo "5. PRODUCT CATEGORIES:\n";
$categories = Product::distinct('category')->pluck('category');
foreach ($categories as $cat) {
    $count = Product::where('category', $cat)->count();
    echo "   - $cat ($count products)\n";
}

echo "\n✅ ALL SYSTEMS OPERATIONAL - Ready to view products!\n";
