<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTwitterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_twitter_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('user_twitter_login');
            $table->longText('twitter_access_token');
            $table->longText('twitter_access_token_secret');
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
        Schema::drop('user_twitter_accounts');
    }
}
