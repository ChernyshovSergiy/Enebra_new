<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanSectionPointsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_plan_section_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('point');
            $table->string('description');
            $table->integer('phase_id');
            $table->integer('section_id');
            $table->integer('sort');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_plan_section_points');
    }
}
