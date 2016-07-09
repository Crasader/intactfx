<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesPhoneCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_countries_phone_code', function (Blueprint $table) {
            $table->increments('id');
            $table->char('iso', 15);
            $table->char('name', 80);
            $table->char('nicename', 80);
            $table->char('iso3', 3);
            $table->smallInteger('numcode');
            $table->integer('phonecode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('intact_countries_phone_code');
    }
}
