<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->words(3, true),
                'description' => $faker->paragraph,
                'slug' => $faker->slug,
                'image' => $faker->imageUrl(800, 600, 'products'), // Fake image URL
                'price' => $faker->randomFloat(2, 10, 1000),
                'status' => 'active',
                'sku' => $faker->unique()->ean13
            ]);
        }
    }
}
