<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWallet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id')->references('id')->on('intact_users')->onDelete('cascade');
            $table->float("main");
            $table->float("commision_A");
            $table->float("commision_B");
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
        Schema::drop('intact_wallet');
    }
}
