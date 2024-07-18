<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            ProvincesTableSeeder::class,
            DistrictsTableSeeder::class,
            CommunesTableSeeder::class,
            VillagesTableSeeder::class,
            TeamsTableSeeder::class,
            TeamUserTableSeeder::class,
            GendersTableSeeder::class,
            CountriesTableSeeder::class,
            PeopleTableSeeder::class,
            PersonMetadataTableSeeder::class,
            CouplesTableSeeder::class,
            SqlFileSeeder::class,
           ]);
    }
}
