<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SqlFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = [
            database_path('seeders\provinces.sql'),
            database_path('seeders\districts.sql'),
            database_path('seeders\communes.sql'),
            database_path('seeders\villages.sql'),
        ];

        foreach ($sql as $file) {
            if(File::exists($file)) {
                $newSql =File::get($file);
                DB::unprepared($newSql);
            }else{
                $this->command->info('File not found: '.$file);
            }
        }

    }
}
