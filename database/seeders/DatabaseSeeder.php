<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Pressing;
use App\Models\Agency;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
       // Pressing Seeder
       Pressing::factory()->count(5)->create();

       // Agence Seeder
       Agency::factory()->count(5)->create();

       // Users Seeder
       User::factory()->count(5)->create();

    }
}
