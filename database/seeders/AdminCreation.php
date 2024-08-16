<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminCreation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "fullname" => "Christian Edorh",
            "phone_number" => "90959953",
            "email" => "christianedorh@gmail.com",
            "address" => "Togo, Lomé, Nyekonakpoe",
            "agency_id" => 1,
            "status" => true,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $user = User::where("email", "christianedorh@gmail.com")->get()->first();

        $myrole = Role::findByName('admin');
        $user->assignRole($myrole);
    }
}
