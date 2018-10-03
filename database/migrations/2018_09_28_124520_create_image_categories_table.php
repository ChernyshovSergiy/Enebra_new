<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('image_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('image_categories');
    }
}
