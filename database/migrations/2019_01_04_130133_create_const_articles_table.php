<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('const_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->json('article')->nullable();
            $table->unsignedInteger('const_sections_id');
            $table->integer('sort');
            $table->boolean('side');
            $table->timestamps();
        });
        Schema::table('const_articles', function (Blueprint $table) {
            $table->foreign('const_sections_id')->references('id')
                ->on('const_sections');
        });
    }

    public function down(): void
    {
        Schema::table('const_articles', function (Blueprint $table) {
            $table->dropForeign(['const_sections_id']);
        });
        Schema::dropIfExists('const_articles');
    }
}
