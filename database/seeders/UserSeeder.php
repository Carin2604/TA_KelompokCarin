<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = array(
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password')
            ]
        );
        foreach($user AS $u){
            User::create([
                'name' => $u['name'],
                'email' => $u['email'],
                'password' => $u['password']
            ]);
        }
    }
}
