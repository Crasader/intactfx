<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactMerchantWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('intact_merchant_wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->foreign('eoffice_id')->references('id')->on('intact_accounts');
            $table->enum('type', ['deposit', 'withdrawal', 'code']);
            $table->decimal('amount', 10, 2);
            $table->char('code', 15);
            $table->enum('consumed', ['0', '1'])->default(0);
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
         Schema::drop('intact_merchant_wallet');
    }
}
