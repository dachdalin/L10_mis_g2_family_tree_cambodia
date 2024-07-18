<?php

namespace Database\Seeders;

use App\Models\TeamUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teamUsers = [
            ['team_id' => 1, 'user_id' => 1, 'role' => 'owner'],
            ['team_id' => 2, 'user_id' => 2, 'role' => 'owner'],
        ];

        foreach ($teamUsers as $teamUser) {
            TeamUser::create($teamUser);
        }
    }
}
