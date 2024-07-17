<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Phnom Penh', 'slug' => 'phnom-penh', 'province_code' => 'PP'],
            ['name' => 'Siem Reap', 'slug' => 'siem-reap', 'province_code' => 'SR'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
