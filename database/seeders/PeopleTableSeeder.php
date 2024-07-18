<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'birthname' => 'Jonathan Doe',
                'nickname' => 'Johnny',
                'sex' => 'm',
                'gender_id' => null, // Assuming there's no gender assigned initially
                'father_id' => null,
                'mother_id' => null,
                'parents_id' => null,
                'dob' => '1980-01-01',
                'yob' => 1980,
                'pob' => 'Phnom Penh',
                'dod' => null,
                'yod' => null,
                'pod' => null,
                'street' => '123 Main St',
                'number' => '456',
                'postal_code' => '12345',
                'city' => 'Phnom Penh',
                'province' => 'Phnom Penh',
                'state' => 'Phnom Penh',
                'country_id' => 1, // Assuming Cambodia has id 1
                'phone' => '123456789',
                'photo' => null,
                'team_id' => 1, // Assuming John belongs to Team SuperAdmin
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'birthname' => 'Janet Doe',
                'nickname' => 'Janey',
                'sex' => 'f',
                'gender_id' => null, // Assuming there's no gender assigned initially
                'father_id' => null,
                'mother_id' => null,
                'parents_id' => null,
                'dob' => '1985-02-01',
                'yob' => 1985,
                'pob' => 'Siem Reap',
                'dod' => null,
                'yod' => null,
                'pod' => null,
                'street' => '789 Main St',
                'number' => '101',
                'postal_code' => '67890',
                'city' => 'Siem Reap',
                'province' => 'Siem Reap',
                'state' => 'Siem Reap',
                'country_id' => 1, // Assuming Cambodia has id 1
                'phone' => '987654321',
                'photo' => null,
                'team_id' => 2, // Assuming Jane belongs to Team Admin
            ],
        ];

        foreach ($people as $person) {
            Person::create($person);
        }
    }
}
