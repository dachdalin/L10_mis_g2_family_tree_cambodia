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
                'name'       => 'supperadmin',
                'email'          => 'supperadmin@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ],
            [
                'name'       => 'admin',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ],
            [
                'name'       => 'assistant',
                'email'          => 'assistant@gmail.com',
                'password'       => bcrypt('11223344'),
                'remember_token' => null,
            ]
        ];
    
        User::insert($users);
    }
}
