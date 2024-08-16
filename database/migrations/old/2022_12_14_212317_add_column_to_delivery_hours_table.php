<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDeliveryHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_hours', function (Blueprint $table) {
            $table->integer('lavage_hour')->change();
            $table->integer('express_hour')->change();
            $table->integer('repassage_hour')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_hours', function (Blueprint $table) {
            //
        });
    }
}
