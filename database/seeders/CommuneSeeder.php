<?php

namespace Database\Seeders;
use App\Models\Commune;
use Illuminate\Support\Facades\File;


use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = File::get(base_path('communes.json'));
        $communes = json_decode($file);


        foreach ($communes as $commune) {
            Commune::updateOrInsert([
                'departement' => $commune->departement,
                'nom_commune' => $commune->nom_commune,
            ]);
        }
    }
}
