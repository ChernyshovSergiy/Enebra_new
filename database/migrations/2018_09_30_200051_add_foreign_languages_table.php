<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignLanguagesTable extends Migration
{
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->unsignedInteger('flag_image_id')->change();
            $table->foreign('flag_image_id')->references('id')->on('images');
        });
    }

    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->dropForeign(['flag_image_id']);
        });
    }
}
