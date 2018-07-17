<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInstagramAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_instagram_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('id_user_instagram');
            $table->string('user_instagram_name');
            $table->longText('instagram_access_token');
            $table->string('date_create');
            $table->string('date_end_of_life');
            $table->boolean('authorization')->default(0);
            $table->string('self_token');
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
        Schema::drop('user_linkedin_accounts');
    }
}
