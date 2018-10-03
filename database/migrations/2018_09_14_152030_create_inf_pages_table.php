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
            $table->integer('user_id')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->text('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->text('top_textarea')->nullable();
            $table->text('left_textarea')->nullable();
            $table->text('right_textarea')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('image_id')->nullable();
            $table->integer('menu')->default(0);
            $table->integer('if_desc')->default(0);
            $table->text('text_description')->nullable();
            $table->integer('sort')->nullable();
            $table->integer('original')->default(0);
            $table->string('keywords')->nullable();
            $table->text('meta_desc')->nullable();
            $table->integer('meta_id')->nullable();
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_pages');
    }
}
