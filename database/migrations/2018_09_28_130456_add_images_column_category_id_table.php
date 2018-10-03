<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesColumnCategoryIdTable extends Migration
{
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('image_categories');
        });
    }

    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
