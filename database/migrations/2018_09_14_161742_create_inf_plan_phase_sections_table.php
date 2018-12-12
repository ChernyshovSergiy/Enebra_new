<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanPhaseSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_plan_phase_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->json('sub_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_plan_phase_sections');
    }
}
