<?php

namespace Database\Seeders;

use App\Models\{Domain,Fichier};
use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    public function run()
    {
        $fichiers = Fichier::all();

        foreach ($fichiers as $fichier) {
            Domain::create([
                'name' => strtolower(str_replace(' ', '-', $fichier->name)) . '.test',
                'linked_file_id' => $fichier->id,
                'ssl_enabled' => true,
                'status' => 'active'
            ]);
        }
    }
}