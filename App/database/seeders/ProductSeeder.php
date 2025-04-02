<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Sample Product 1',
                'slug' => Str::slug('Sample Product 1'),
                'description' => 'This is a sample description for product 1.',
                'price' => 19.99,
                'image' => 'products/sample1.jpg',
            ],
            [
                'name' => 'Sample Product 2',
                'slug' => Str::slug('Sample Product 2'),
                'description' => 'This is a sample description for product 2.',
                'price' => 29.99,
                'image' => 'products/sample2.jpg',
            ],
        ]);
    }
}
