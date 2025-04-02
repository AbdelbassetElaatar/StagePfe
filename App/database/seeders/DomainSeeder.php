<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domain;

class DomainSeeder extends Seeder
{
    public function run()
    {
        Domain::insert([
            [
                'name' => 'example1.com',
                'linked_file' => 'templates/example1.html',
            ],
            [
                'name' => 'example2.net',
                'linked_file' => 'templates/example2.html',
            ],
        ]);
    }
}
