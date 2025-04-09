<?php

namespace Database\Seeders;
use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        Template::create([
            'name' => 'Ecommerce Template',
            'file_path' => 'templates/ecommerce.blade.php',
            'currency' => 'USD',
            'header_injection' => '<meta name="description" content="Sample template">',
            'footer_injection' => '<!-- Footer content -->',
            'status' => 'active'
        ]);

        // Add more templates if needed
    }
}