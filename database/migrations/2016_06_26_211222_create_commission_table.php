<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_commission_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_mt4login_id');
            $table->string('from_eoffice');
            $table->string('to_eoffice');
            $table->string('commission_type');
            $table->string('account_type');
            $table->integer('volume')->unsigned();
            $table->decimal('amount', 5, 2);
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
        Schema::drop('intact_commission_table');
    }
}
