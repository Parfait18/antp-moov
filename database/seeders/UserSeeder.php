<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' =>  Carbon::now(),
            'password' => Hash::make('password'),
            'remember_token'=> Hash::make('token'),
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
            'role'   =>  'admin'
        ]);

    }
}
