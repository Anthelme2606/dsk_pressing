<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deposit;

class DepositAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deposits = Deposit::all();
        foreach ($deposits as $deposit) {
            $deposit->agency_id = 1;
            $deposit->save();
        }

    }
}
