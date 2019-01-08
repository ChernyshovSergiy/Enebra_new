<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqAnswersTable extends Migration
{
    public function up(): void
    {
        Schema::create('faq_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->json('answer')->nullable();
            $table->unsignedInteger('faq_question_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('language_id');
            $table->integer('views')->nullable();
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
        Schema::table('faq_answers', function (Blueprint $table) {
            $table->foreign('faq_question_id')->references('id')
                ->on('faq_questions');
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('language_id')->references('id')
                ->on('languages');
        });
    }

    public function down(): void
    {
        Schema::table('faq_answers', function (Blueprint $table) {
            $table->dropForeign(['faq_question_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists('faq_answers');
    }
}
