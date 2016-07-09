<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnConfirmAndConfirmNumberInProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intact_user_profile', function (Blueprint $table) {
            $table->char('confirm_phone_number', 15)->after('phone_number');
            $table->boolean('confirm_phone_status')->after('confirm_phone_number');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intact_user_profile', function (Blueprint $table) {
            $table->dropColumn('confirm_phone_number');
            $table->dropColumn('confirm_phone_status');
        });
    }
}
