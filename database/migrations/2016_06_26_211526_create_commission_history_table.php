<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('intact_commission_history_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eoffice_id');
            $table->char('volume');
            $table->string('account_type');
            $table->decimal('level1', 10, 2);
            $table->decimal('level2', 10, 2);
            $table->decimal('level3', 10, 2);
            $table->decimal('level4', 10, 2);
            $table->decimal('level5', 10, 2);
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
        Schema::drop('intact_commission_history_table');
    }
}
