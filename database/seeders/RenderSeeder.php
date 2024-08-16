<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Render;

class RenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $renders = ['Plié(e)', 'Cintre'];

        foreach($renders as $render){
            Render::create(['name' => $render]);
        }
    }
}
