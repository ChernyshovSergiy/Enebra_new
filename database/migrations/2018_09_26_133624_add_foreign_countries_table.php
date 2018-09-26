<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCountriesTable extends Migration
{
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');
            $table->dropForeign(['language_id']);
        });
    }
}
