<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideoGroupSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_video_group_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('video_group_id');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_video_group_sections');
    }
}
