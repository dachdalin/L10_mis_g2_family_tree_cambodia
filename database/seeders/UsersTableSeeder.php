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
                'firstname' => 'supperadmin',
                'lastname' => 'User',
                'status' => true,
                'email' => 'supperadmin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('11223344'),
                'create_by' => null,
                'current_team_id' => 1, // Set to Team SuperAdmin
                'profile_photo_path' => null,
                'language' => 'kh',
                'timezone' => 'UTC',
                'is_developer' => false,
                'seen_at' => now(),
                'remember_token' => null,
            ],
            [
                'firstname' => 'admin',
                'lastname' => 'User',
                'status' => true,
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('11223344'),
                'create_by' => null,
                'current_team_id' => 2, // Set to Team Admin
                'profile_photo_path' => null,
                'language' => 'kh',
                'timezone' => 'UTC',
                'is_developer' => false,
                'seen_at' => now(),
                'remember_token' => null,
            ],
            [
                'firstname' => 'assistant',
                'lastname' => 'User',
                'status' => true,
                'email' => 'assistant@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('11223344'),
                'create_by' => null,
                'current_team_id' => 3, // Set to Team Assistant
                'profile_photo_path' => null,
                'language' => 'kh',
                'timezone' => 'UTC',
                'is_developer' => false,
                'seen_at' => now(),
                'remember_token' => null,
            ]
        ];

        User::insert($users);
    }
}
