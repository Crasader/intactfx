<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntactUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intact_user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('intact_users');
            $table->char('account_stat', 40)->default('not');
            $table->string('profile_picture_url', 100);
            $table->string('identity_file_url', 100);
            $table->string('address_file_url', 100);
            $table->char('last_name', 60);
            $table->char('first_name', 60);
            $table->char('gender', 40);
            $table->date('birthdate');
            $table->char('phone_number', 40);
            $table->char('email', 60);
            $table->string('address', 200);
            $table->string('address2', 200);
            $table->char('city', 100);
            $table->char('state', 100);
            $table->char('country', 100);
            $table->char('zipcode', 10);
            $table->char('skype_id', 100);
            $table->char('icq_number', 100);
            $table->char('twitter_username', 100);
            $table->char('google_email', 100);
            $table->char('facebook_url', 100);
            $table->char('instagram_url', 100);
            $table->string('bank_name', 200);
            $table->char('bank_account', 50);
            $table->string('bank_fullname', 200);
            $table->char('bank_swiftcode', 100);
            $table->char('bank_country', 100);
            $table->char('bank_state', 100);
            $table->char('netteller', 100);
            $table->char('skrill', 100);
            $table->char('perfect_money', 100);
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
         Schema::drop('intact_user_profile');
    }
}
