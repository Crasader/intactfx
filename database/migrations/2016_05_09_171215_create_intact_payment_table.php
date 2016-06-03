<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_payment_table', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('payment_id')->unique();
            $table->string('funding_service');
            $table->string('type');
            $table->string('payee_account');
            $table->decimal('payment_amount', 5, 2);
            $table->string('payment_units');
            $table->string('payment_batch_num');
            $table->string('payor_account');
            $table->string('email');
            $table->boolean('confirm')->default(false);
            $table->string('timestamp_gmt');
            $table->string('hash');
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
        Schema::drop('intact_payment_table');
    }
}
