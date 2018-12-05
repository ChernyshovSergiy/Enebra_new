<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfIntroductionPointsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_introduction_points', function (Blueprint $table) {
            $table->increments('id');
            $table->json('point')->nullable();
            $table->unsignedInteger('link_id');
            $table->integer('sort');
            $table->timestamps();
        });
        Schema::table('inf_introduction_points', function (Blueprint $table) {
            $table->foreign('link_id')->references('id')
                ->on('menus')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropForeign(['link_id']);
        });
        Schema::dropIfExists('inf_introduction_points');
    }
}
