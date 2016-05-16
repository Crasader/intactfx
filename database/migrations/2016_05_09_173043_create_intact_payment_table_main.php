<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactPaymentTableMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_payment_table_main', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('user_id')->unsigned()->index();
            // $table->foreign('user_id')->references('id')->on('intact_users');
            $table->integer('payment_id')->unsigned()->index();
            $table->foreign('payment_id')->references('id')->on('intact_payment_table');
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
        Schema::drop('intact_payment_table_main');
    }
}
