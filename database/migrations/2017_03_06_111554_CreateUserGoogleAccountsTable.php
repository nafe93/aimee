<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGoogleAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_google_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_user');
            $table->string('id_user_google');
            $table->string('user_google_name');
            $table->longText('google_access_token');
            $table->string('date_create');
            $table->string('date_end_of_life');
            $table->string('refresh_token');
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
