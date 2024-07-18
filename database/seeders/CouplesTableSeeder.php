<?php

namespace Database\Seeders;

use App\Models\Couple;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couples = [
            ['person1_id' => 1, 'person2_id' => 2, 'date_start' => '2010-06-01', 'is_married' => true, 'team_id' => 1],
            // Add more couples as needed
        ];

        foreach ($couples as $couple) {
            Couple::create($couple);
        }
    }
}
