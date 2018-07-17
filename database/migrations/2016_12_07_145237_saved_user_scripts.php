<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SavedUserScripts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_user_scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->longtext('user_tokens');
            $table->string('script_name');
            $table->longtext('sheduler_parameters');
            $table->string('script_target');
            $table->longtext('script_parameters');
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

    }
}
