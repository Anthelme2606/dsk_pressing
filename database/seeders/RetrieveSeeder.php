<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deposit;
use App\Models\Transaction;

class RetrieveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveries = Deposit::where('status', 0)->get();
        foreach($deliveries as $del){
            $transaction = Transaction::where("deposit_id", $del->id)->orderBy('transaction_date','ASC')->get();
            if(count($transaction)>0){
                $del->instant_retrieve = $transaction->last()->transaction_date;
                $del->save();
            }
        }
    }
}
