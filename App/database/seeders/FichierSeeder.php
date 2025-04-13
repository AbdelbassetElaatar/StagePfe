<?php

namespace Database\Seeders;

use App\Models\{Fichier, Template, Product};
use Illuminate\Database\Seeder;

class FichierSeeder extends Seeder
{
    public function run()
    {
        $template = Template::first();
        $products = Product::all();

        foreach ($products as $product) {
            Fichier::create([
                'name' => "Generated File for {$product->name}",
                'template_id' => $template->id,
                'product_id' => $product->id,
                'header_injection' => null,
                'footer_injection' => null
            ]);
        }
    }
}
