<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class TestingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_users = ['sparkpressing1@gmail.com', 'sparkpressing2@gmail.com', 'sparkpressing3@gmail.com'];
        $list_fullname = ["First User", 'Second User', 'Third User'];
        $list_phone = ["96856196", '96854521', '99855652'];


        $roles = ['caissier', 'manager', 'admin'];

        for($move=0; $move<count($list_users); $move++){
            $user = new User();
            $user->fullname = $list_fullname[$move];
            $user->phone_number = $list_phone[$move];
            $user->email = $list_users[$move];
            $user->address = "Togo, Lomé, Totsi, 25, 10";
            $user->agency_id = 1;
            $user->status = true;
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->remember_token = Str::random(10);
            $user->save();
            $myrole = Role::findByName(
                $roles[$move]);
            $user->assignRole($myrole);
        }
    }
}
