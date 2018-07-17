<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 01.12.2016
 * Time: 17:30
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_jobs_table', function (Blueprint $table) {
            $table->increments('id'); //task id
            $table->string('user_id'); //user id , which run this
            $table->string('visual_name'); //showable
            $table->string('run_type');  //external/internal
            $table->string('shedule');
            $table->string('status');  //task status
            $table->string('script_runner'); //R_RUNNER
            $table->string('script_storage');  //R_TYPE


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
        Schema::drop('user_jobs_table');
    }
}