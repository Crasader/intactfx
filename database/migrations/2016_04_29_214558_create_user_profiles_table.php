<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('id')->on('intact_users')->onDelete('cascade');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('Phone 1');
            $table->string('Phone 2');
            $table->string('St_Address');
            $table->string('city');
            $table->string('zipcode');
            $table->integer('country_code');
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
        Schema::drop('intact_profiles');
    }
}
