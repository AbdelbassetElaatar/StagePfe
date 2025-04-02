<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;
class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::insert([
            [
                'name' => 'Template One',
                'file_path' => 'templates/template1.html',
                'facebook_pixel' => '<script>console.log("Pixel 1 Loaded")</script>',
                'product_id' => $products[0] ?? 1,
            ],
            [
                'name' => 'Template Two',
                'file_path' => 'templates/template2.html',
                'facebook_pixel' => '<script>console.log("Pixel 2 Loaded")</script>',
                'product_id' => $products[1] ?? 1,
            ],
        ]);
    }
}
