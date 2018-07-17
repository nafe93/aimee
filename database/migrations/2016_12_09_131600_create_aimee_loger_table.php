<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 09.12.2016
 * Time: 13:18
 */
class CreateAimeeLogerTable extends Migration
{

    public function up()
    {
        Schema::create('aimee_logger', function (Blueprint $table) {
            $table->increments('id');
            $table->string('process_id');
            $table->string('user_id');
            $table->string('source');
            $table->longtext('message');
            $table->text('technical_info');
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
        Schema::drop('aimee_logger');
    }
}