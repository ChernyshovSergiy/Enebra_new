<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPagesTable extends Migration
{
    public function up()
    {
        Schema::create('inf_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('sub_title')->nullable();
            $table->string('description')->nullable();
            $table->string('top_textarea')->nullable();
            $table->string('left_textarea')->nullable();
            $table->string('right_textarea')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('img_id')->nullable();
            $table->integer('menu')->default(0);
            $table->integer('if_desc')->default(0);
            $table->string('text_description')->nullable();
            $table->integer('sort')->nullable();
            $table->integer('original')->default(0);
            $table->string('keywords')->nullable();
            $table->string('meta_desc')->nullable();
            $table->integer('meta_id')->nullable();
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_pages');
    }
}
