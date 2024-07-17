<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['name' => 'Dangkao', 'slug' => 'dangkao', 'province_id' => 1, 'district_code' => 'DK'],
            ['name' => 'Angkor Thom', 'slug' => 'angkor-thom', 'province_id' => 2, 'district_code' => 'AT'],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
