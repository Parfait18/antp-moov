<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\AgentMoov;


class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = File::get(base_path('agents.json'));
        $agents = json_decode($file);


        foreach ($agents as $agt) {
            AgentMoov::updateOrInsert([
                'code' => $agt->code,
                'nom_prenom' => $agt->nom_prenom
            ]);
        }

    }
}
