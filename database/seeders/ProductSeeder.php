<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Noir Signature Perfume',
                'description' => 'Warm amber, smoked vanilla, and soft woods.',
                'price' => '149.00',
                'image' => 'images/products/product-perfume.png',
                'category' => 'Fragrance',
                'featured' => true,
            ],
            [
                'name' => 'Éclat Ring',
                'description' => 'A minimalist band with a luminous finish.',
                'price' => '220.00',
                'image' => 'images/products/product-ring.png',
                'category' => 'Jewelry',
                'featured' => true,
            ],
            [
                'name' => 'Midnight Bracelet',
                'description' => 'Polished metal links, understated and bold.',
                'price' => '180.00',
                'image' => 'images/products/product-bracelet.png',
                'category' => 'Jewelry',
                'featured' => true,
            ],
            [
                'name' => 'Obsidian Necklace',
                'description' => 'A refined pendant designed for everyday wear.',
                'price' => '260.00',
                'image' => 'images/products/product-necklace.png',
                'category' => 'Jewelry',
                'featured' => true,
            ],
            [
                'name' => 'Sillage Travel Spray',
                'description' => 'A compact companion for your signature scent.',
                'price' => '59.00',
                'image' => 'images/products/product-perfume.png',
                'category' => 'Fragrance',
                'featured' => false,
            ],
            [
                'name' => 'Gilded Cuff',
                'description' => 'A sculpted cuff with a subtle sheen.',
                'price' => '195.00',
                'image' => 'images/products/product-bracelet.png',
                'category' => 'Jewelry',
                'featured' => false,
            ],
            [
                'name' => 'Contour Ring Set',
                'description' => 'Stackable bands for a clean, modern profile.',
                'price' => '240.00',
                'image' => 'images/products/product-ring.png',
                'category' => 'Jewelry',
                'featured' => false,
            ],
            [
                'name' => 'Lustre Pendant',
                'description' => 'A fine chain with a luminous pendant detail.',
                'price' => '210.00',
                'image' => 'images/products/product-necklace.png',
                'category' => 'Jewelry',
                'featured' => false,
            ],
        ];

        foreach ($rows as $row) {
            Product::updateOrCreate(
                ['slug' => Str::slug($row['name'])],
                ['slug' => Str::slug($row['name']), ...$row],
            );
        }
    }
}
