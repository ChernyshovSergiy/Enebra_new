<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeIsDoneColumnInInfPlanSectionPointsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->boolean('is_done')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->integer('is_done')->default(0);
        });
    }
}
