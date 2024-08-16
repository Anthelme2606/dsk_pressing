<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Deposits
        Schema::table('deposits', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Deposit Units
        Schema::table('deposit_units', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Pressings
        Schema::table('pressings', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Agencies
        Schema::table('agencies', function (Blueprint $table) {
            $table->softDeletes();
        });
        // Accounts
        Schema::table('accounts', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Sponsorships
        Schema::table('sponsorships', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('promos', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropSoftDeletes();
        });

        // Deposit Units
        Schema::table('deposit_units', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Pressings
        Schema::table('pressings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Agencies
        Schema::table('agencies', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        // Accounts
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Sponsorships
        Schema::table('sponsorships', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('promos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
