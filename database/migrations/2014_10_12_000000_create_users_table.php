<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_referral_id')->nullable();
            $table->integer('citizen_country_id');
            $table->integer('biometric_photo_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_en');
            $table->string('last_name_en');
            $table->integer('sex_id');
            $table->integer('birth_country_id');
            $table->integer('document_id');
            $table->string('document_number');
            $table->integer('birth_day');
            $table->integer('birth_month');
            $table->year('birth_year');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('login')->nullable();
            $table->string('password');
            $table->integer('avatar_id');
            $table->rememberToken();
            $table->integer('role_id');
            $table->integer('status_id')->default(0);
            $table->string('referral_id')->unique();
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
