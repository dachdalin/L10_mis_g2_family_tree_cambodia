<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'user_id' => 1, // Assuming the super admin user will have ID 1
                'name' => 'Team SuperAdmin',
                'description' => 'SuperAdmin Team',
                'personal_team' => true,
            ],
            [
                'user_id' => 2, // Assuming the admin user will have ID 2
                'name' => 'Team Admin',
                'description' => 'Admin Team',
                'personal_team' => true,
            ],
            [
                'user_id' => 3, // Assuming the assistant user will have ID 3
                'name' => 'Team Assistant',
                'description' => 'Assistant Team',
                'personal_team' => true,
            ],
        ];

        Team::insert($teams);
    }
}
