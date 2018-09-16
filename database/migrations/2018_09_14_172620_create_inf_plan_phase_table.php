<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanPhaseTable extends Migration
{
    public function up()
    {
        Schema::create('inf_plan_phase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_plan_phase');
    }
}
