<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communes = [
            ['name' => 'Choeung Ek', 'slug' => 'choeung-ek', 'district_id' => 1, 'commune_code' => 'CE'],
            ['name' => 'Bakong', 'slug' => 'bakong', 'district_id' => 2, 'commune_code' => 'BK'],
        ];

        foreach ($communes as $commune) {
            Commune::create($commune);
        }
    }
}
