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
            $table->unsignedInteger('user_id')->default(1);
            $table->unsignedInteger('title_id');
            $table->json('text')->nullable();
            $table->integer('views_count')->default(0);
            $table->unsignedInteger('image_id')->nullable();
            $table->boolean('menu')->default(1);
            $table->boolean('if_desc')->default(0);
            $table->integer('sort')->nullable();
            $table->unsignedInteger('original')->default(0);
            $table->integer('meta_id')->default(0);
            $table->timestamps();
        });

        Schema::table('inf_pages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('title_id')->references('id')
                ->on('menus')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('original')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['title_id']);
            $table->dropForeign(['image_id']);
            $table->dropForeign(['original']);
        });
        Schema::dropIfExists('inf_pages');
    }
}
