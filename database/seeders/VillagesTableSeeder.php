<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            ['name' => 'Phum Thmei', 'slug' => 'phum-thmei', 'commune_id' => 1, 'commune_code' => 'PT'],
            ['name' => 'Preah Dak', 'slug' => 'preah-dak', 'commune_id' => 2, 'commune_code' => 'PD'],
        ];

        foreach ($villages as $village) {
            Village::create($village);
        }
    }
}
