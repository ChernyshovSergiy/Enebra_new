<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfPagesTable extends Migration
{
    public function up()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('image_id')->change();
            $table->foreign('image_id')->references('id')->on('images');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['image_id']);
            $table->dropForeign(['language_id']);
        });
    }
}
