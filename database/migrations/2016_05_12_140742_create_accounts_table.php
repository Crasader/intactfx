<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_accounts', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('intact_users');
            $table->decimal('main_wallet', 5, 2);
            $table->decimal('commision_wallet', 5, 2);
            $table->decimal('iprofit_commision_wallet', 5, 2);
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
        Schema::drop('intact_accounts');
    }
}
