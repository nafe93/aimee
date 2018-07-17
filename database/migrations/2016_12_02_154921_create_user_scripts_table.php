<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('script_name');
            $table->string('script_filename');
            $table->string('script_interpretator');
            $table->string('script_class');
            $table->longtext('script_parameters');
            $table->text('script_info');
            $table->boolean('external');
            $table->string('billing_plan');
            $table->string('script_target');
            $table->string('categories');
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
        Schema::drop('user_scripts');
    }
}
