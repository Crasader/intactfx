<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_ref');                  // account ref is a string with uppercase letters and numbers as unique identifier for an account. 
            $table->integer('affiliate')->default(null);   // the id of the affiliate who referred the user 
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('activated')->default(false);
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::drop('intact_users');
    }
}
