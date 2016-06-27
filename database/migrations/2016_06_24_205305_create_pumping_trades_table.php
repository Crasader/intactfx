<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePumpingTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_pumpingtrades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mt4login_id');
            $table->string('symbol');
            $table->string('profit');
            $table->integer('volume')->unsigned();
            $table->boolean('has_read')->default(0);
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
        Schema::drop('intact_pumpingtrades');
    }
}
