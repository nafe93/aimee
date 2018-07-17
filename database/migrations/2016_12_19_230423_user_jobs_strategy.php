<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserJobsStrategy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_jobs_strategy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('social_network');
            $table->string('user_account');
            $table->longText('script_name');
            $table->longText('script_parameters');
            $table->longText('user_tokens');
            $table->longText('user_message');
            $table->string('check_shedule');
            $table->string('time_shedule');
            $table->string('shedule_script_hours');
            $table->string('shedule_script_minutes');
            $table->string('script_total_repeat');
            $table->string('source_network');
            $table->string('source_account');
            $table->string('create_date');
            $table->string('id_task');
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
        Schema::drop('user_jobs_strategy');
    }
}