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
            'currency' => 'MAD',
        ]);

    }
}