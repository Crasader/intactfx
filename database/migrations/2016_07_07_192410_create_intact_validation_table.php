<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactValidationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_validation_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->foreign('eoffice_id')->references('id')->on('intact_accounts');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('intact_users');
            $table->char('otp', 6);
            $table->char('validationcode', 6);
            $table->boolean('is_deleted')->default(0);
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
          Schema::drop('intact_validation_table');
    }


}
