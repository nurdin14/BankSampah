<?php

namespace Database\Seeders;

use \App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Dede',
                'email' => 'dededidin5@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'user'
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
