<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    try {
        $products = Product::latest()->take(8)->get();
    } catch (\Throwable) {
        $fallback = [
            ['name' => 'Noir Signature Perfume', 'slug' => 'noir-signature-perfume', 'price' => '149.00', 'image' => 'images/products/product-perfume.png', 'category' => 'Fragrance', 'featured' => true],
            ['name' => 'Éclat Ring', 'slug' => 'eclat-ring', 'price' => '220.00', 'image' => 'images/products/product-ring.png', 'category' => 'Jewelry', 'featured' => true],
            ['name' => 'Midnight Bracelet', 'slug' => 'midnight-bracelet', 'price' => '180.00', 'image' => 'images/products/product-bracelet.png', 'category' => 'Jewelry', 'featured' => true],
            ['name' => 'Obsidian Necklace', 'slug' => 'obsidian-necklace', 'price' => '260.00', 'image' => 'images/products/product-necklace.png', 'category' => 'Jewelry', 'featured' => true],
            ['name' => 'Sillage Travel Spray', 'slug' => 'sillage-travel-spray', 'price' => '59.00', 'image' => 'images/products/product-perfume.png', 'category' => 'Fragrance', 'featured' => false],
            ['name' => 'Gilded Cuff', 'slug' => 'gilded-cuff', 'price' => '195.00', 'image' => 'images/products/product-bracelet.png', 'category' => 'Jewelry', 'featured' => false],
            ['name' => 'Contour Ring Set', 'slug' => 'contour-ring-set', 'price' => '240.00', 'image' => 'images/products/product-ring.png', 'category' => 'Jewelry', 'featured' => false],
            ['name' => 'Lustre Pendant', 'slug' => 'lustre-pendant', 'price' => '210.00', 'image' => 'images/products/product-necklace.png', 'category' => 'Jewelry', 'featured' => false],
        ];

        $products = collect($fallback)->map(fn (array $row) => new Product($row));
    }

    return view('home', compact('products'));
});
