<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactSmsMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_sms_monitoring', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->foreign('eoffice_id')->references('id')->on('intact_accounts');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('intact_users');
            $table->string('msg');
            $table->string('to');
            $table->char('status', 80);
            $table->char('batch_id', 11);
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
          Schema::drop('intact_sms_monitoring');
    }
}
