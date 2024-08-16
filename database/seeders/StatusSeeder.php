<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state_list = ['Déchiré', 'Taché', 'Btn cassé'];

        foreach($state_list as $state){
            Status::create(
                [
                    'title' => $state
                ]
            );
        }
    }
}
