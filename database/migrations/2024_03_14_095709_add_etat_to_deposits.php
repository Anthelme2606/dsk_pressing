<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEtatToDeposits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // const $results_possible = array('En attente de traitement', 'En cours de traitement', 'Traité', 'Classé');

    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->string('etat')->nullable()->default('waiting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposits', function (Blueprint $table) {
            //
        });
    }
}
