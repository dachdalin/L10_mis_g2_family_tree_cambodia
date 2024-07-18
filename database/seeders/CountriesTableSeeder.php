<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['iso2' => 'KH', 'iso3' => 'KHM', 'name' => 'Cambodia', 'name_nl' => 'Cambodja', 'isd' => '855', 'is_eu' => false],
            ['iso2' => 'US', 'iso3' => 'USA', 'name' => 'United States', 'name_nl' => 'Verenigde Staten', 'isd' => '1', 'is_eu' => false],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
