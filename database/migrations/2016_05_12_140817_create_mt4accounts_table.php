<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMt4accountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_mt4accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->foreign('eoffice_id')->references('id')->on('intact_accounts');
            $table->string('account_type');
            $table->decimal('balance', 5, 2);
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
        Schema::drop('intact_mt4accounts');
    }
}
