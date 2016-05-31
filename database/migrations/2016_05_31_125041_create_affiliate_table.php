<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_affiliate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->foreign('eoffice_id')->references('id')->on('intact_accounts');
            // $table->string('affiliate_id');
            // $table->foreign('affiliate_id')->references('id')->on('intact_accounts');
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
        Schema::drop('intact_affiliate');
    }
}
