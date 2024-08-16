<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NewRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['laveur', 'classeur'];
        $permissions = ['laveur_permissions', 'classeur_permissions'];

        for($i=0; $i<2; $i++){
            $role = Role::create(['name' => $roles[$i]]);
            $permission = Permission::create(['name' => $permissions[$i]]);
            $role->givePermissionTo($permission);
        }
    }
}
