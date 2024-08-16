<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['caissier', 'manager', 'admin'];

        $permissions_list = [
            "casheer_permissions",
            "admin_permissions",
            "manager_permissions"
        ];

        foreach($roles as $role){
            Role::create(['name' => $role]);
        }

        foreach($permissions_list as $permission){
            Permission::create(['name' => $permission]);
        }

        $roles_list = Role::all();

        foreach($roles_list as $role){
            foreach($permissions_list as $permission){
                $role->givePermissionTo($permission);
            }
        }
    }
}
