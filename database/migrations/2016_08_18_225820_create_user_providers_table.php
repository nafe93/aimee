<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_providers', function (Blueprint $table) {
            $table->integer('provider_id');
            $table->integer('user_id');
            $table->string('provider');
            $table->string('oauth_token')->nullable();
            $table->string('oauth_token_secret')->nullable();

            $table->unique(['provider_id', 'user_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_providers');
    }
}
