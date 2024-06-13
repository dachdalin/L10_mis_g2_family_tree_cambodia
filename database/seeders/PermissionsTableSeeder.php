<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'title' => 'user_management_access',
                'group' => 'User Management'
            ],
            [
                'title' => 'permission_create',
                'group' => 'Permission'
            ],
            [
                'title' => 'permission_edit',
                'group' => 'Permission'
            ],
            [
                'title' => 'permission_show',
                'group' => 'Permission'
            ],
            [
                'title' => 'permission_delete',
                'group' => 'Permission'
            ],
            [
                'title' => 'permission_access',
                'group' => 'Permission'
            ],
            [
                'title' => 'role_create',
                'group' => 'Role'
            ],
            [
                'title' => 'role_edit',
                'group' => 'Role'
            ],
            [
                'title' => 'role_show',
                'group' => 'Role'
            ],
            [
                'title' => 'role_delete',
                'group' => 'Role'
            ],
            [
                'title' => 'role_access',
                'group' => 'Role'
            ],
            [
                'title' => 'user_create',
                'group' => 'User'
            ],
            [
                'title' => 'user_edit',
                'group' => 'User'
            ],
            [
                'title' => 'user_show',
                'group' => 'User'
            ],
            [
                'title' => 'user_delete',
                'group' => 'User'
            ],
            [
                'title' => 'user_access',
                'group' => 'User'
            ],
            // [
            //     'title' => 'profile_password_edit',
            //     'group' => 'Profile'
            // ]

          ];
          Permission::insert($permissions);
    }
}
