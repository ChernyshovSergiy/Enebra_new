<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqQuestionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->json('question')->nullable();
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('user_id');
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
        Schema::table('faq_questions', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::table('faq_questions', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('faq_questions');
    }
}
