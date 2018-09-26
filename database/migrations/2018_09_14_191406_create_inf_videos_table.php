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
            $table->text('title');
            $table->text('description');
            $table->text('about_author');
            $table->text('link');
            $table->string('duration_time');
            $table->integer('video_group_id');
            $table->integer('video_group_section_id');
            $table->integer('image_id');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_videos');
    }
}
