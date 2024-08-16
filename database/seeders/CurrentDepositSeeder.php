<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deposit;

class CurrentDepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deposits = Deposit::where("status", 1)->get();
        foreach($deposits as $deposit){
            $deposit->left_to_pay = $deposit->total - $deposit->advanced - $deposit->discount;
            $deposit->save();
        }
    }
}
