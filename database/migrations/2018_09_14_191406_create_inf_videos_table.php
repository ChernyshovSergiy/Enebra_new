<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideosTable extends Migration
{
    public function up()
    {
        Schema::create('inf_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('about_author');
            $table->string('link');
            $table->string('duration_time');
            $table->integer('video_group_id');
            $table->integer('video_group_section_id');
            $table->integer('img_id');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_videos');
    }
}
