<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $myrole = Role::findByName(
            'caissier');

        foreach($users as $user){
            //$user->removeRole($myrole);
            $user->assignRole($myrole);
        }
    }
}
