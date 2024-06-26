<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstname'       => 'supperadmin',
                'email'          => 'supperadmin@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ],
            [
                'firstname'       => 'admin',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ],
            [
                'firstname'       => 'assistant',
                'email'          => 'assistant@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ]
        ];
    
        User::insert($users);
    }
}
