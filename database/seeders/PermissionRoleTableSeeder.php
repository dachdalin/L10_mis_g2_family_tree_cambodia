<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supperadmin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($supperadmin_permissions->pluck('id'));


        // Assign default permissions to supperadmin, admin, and assistant roles
        // $default_user_permissions = $admin_permissions->whereIn('title',['profile_password_edit'])->pluck('id');
        // $rolesWithDefaultPermissions = [1, 2, 3]; // Adjust role IDs as needed

        // foreach ($rolesWithDefaultPermissions as $roleId) {
        //     Role::findOrFail($roleId)->permissions()->sync($default_user_permissions);
        // }

        // Assign permissions other new type permissions to admin role
        $admin_permission = $supperadmin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permission);
    }
}
