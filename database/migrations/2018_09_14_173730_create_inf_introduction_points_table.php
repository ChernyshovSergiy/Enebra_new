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
            $table->text('point');
            $table->string('link')->nullable();
            $table->integer('sort');
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_introduction_points');
    }
}
