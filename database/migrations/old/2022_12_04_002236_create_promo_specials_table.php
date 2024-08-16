<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_specials', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->float('percentage')->default(0);
            $table->integer('nbr_client')->default(0);
            $table->date('ending_date');
            $table->time('ending_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_specials');
    }
}
