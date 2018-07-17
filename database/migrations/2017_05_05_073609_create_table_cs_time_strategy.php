<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCsTimeStrategy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_time_strategy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('user_account');
            $table->string('script_name');
            $table->string('script_parametrs');
            $table->string('time_shedule');
            $table->timeTz('create_date');
            $table->timeTz('update_at');
            $table->text('id_task');
            $table->text('repeat');
            $table->text('cross_sharing_to');
            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cs_time_strategy');
    }
}
