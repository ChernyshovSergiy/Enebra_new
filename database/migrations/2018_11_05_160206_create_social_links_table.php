<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialLinksTable extends Migration
{
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('is_active')->default(0);
            $table->json('url')->nullable();
            $table->integer('sort');
            $table->unsignedInteger('image_id')->nullable();
            $table->timestamps();
        });
        Schema::table('social_links', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')
                ->on('images')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('social_links', function (Blueprint $table) {
            $table->dropForeign('social_links_image_id_foreign');
        });
        Schema::dropIfExists('social_links');
    }
}
