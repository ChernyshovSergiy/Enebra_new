<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideoGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_video_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->text('meta_desc')->nullable();
            $table->integer('meta_id')->nullable();
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_video_groups');
    }
}
