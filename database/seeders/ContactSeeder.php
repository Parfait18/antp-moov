<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msisdn = [
            '95087825',
            '94521463',
            '94940102',
            '94940103',
            '95950203',
            '95959595',
        ];

        foreach ($msisdn as $ms) {
            Contact::create(['msisdn' => $ms, 'statut' => 'EN ATTENTE']);
        }
    }
}
