<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserJobsStrategyTableUserAccountAndTargetAccountLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_jobs_strategy', function (Blueprint $table) {
            $table->string('user_account', 2048)->change();
            $table->string('target_accaunt', 2048)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_jobs_strategy', function (Blueprint $table) {
            $table->string('user_account', 255)->change();
            $table->string('target_accaunt', 255)->change();
        });
    }
}
