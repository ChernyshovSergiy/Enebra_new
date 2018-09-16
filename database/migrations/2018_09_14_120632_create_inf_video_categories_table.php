<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideoCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('inf_video_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('keywords');
            $table->string('meta_desc');
            $table->integer('meta_id');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_video_categories');
    }
}
