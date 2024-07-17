<?php

namespace Database\Seeders;

use App\Models\PersonMetadata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonMetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personMetadata = [
            ['person_id' => 1, 'key' => 'cemetery_location_name', 'value' => 'King George VI Memorial Chapel'],
            ['person_id' => 2, 'key' => 'cemetery_location_address', 'value' => 'Castle, 2 The Cloisters Windsor SL4 1NJ United Kindgom'],
        ];

        foreach ($personMetadata as $metadata) {
            PersonMetadata::create($metadata);
        }
    }
}
