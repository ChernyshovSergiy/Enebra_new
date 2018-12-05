<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('inf_subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('token')->nullable();
            $table->unsignedInteger('language_id')->nullable();
            $table->timestamps();
        });
        Schema::table('inf_subscribers', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')
                ->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_subscribers', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists('inf_subscribers');
    }
}
