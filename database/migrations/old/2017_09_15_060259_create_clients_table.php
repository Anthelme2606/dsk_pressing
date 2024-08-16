<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('fullname');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique();
            $table->string('fixe_number')->unique()->nullable();
            $table->string('city')->nullable();
            $table->date('birthday')->nullable();
            $table->mediumText('waiting_for')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('sponsorship_code');
            $table->foreign('sponsorship_code')->references('id')->on('sponsorships')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('clients');
    }
};
