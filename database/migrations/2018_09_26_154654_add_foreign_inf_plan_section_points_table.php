<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfPlanSectionPointsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->unsignedInteger('phase_id')->change();
            $table->foreign('phase_id')->references('id')->on('inf_plan_phases');

            $table->unsignedInteger('section_id')->change();
            $table->foreign('section_id')->references('id')->on('inf_plan_phase_sections');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->dropForeign(['phase_id']);
            $table->dropForeign(['section_id']);
            $table->dropForeign(['language_id']);
        });
    }
}
