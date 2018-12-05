<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDoneColumnToInfPlanSectionPointsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->integer('is_done')->default(0); // выполнен 1, не выполнен 0
        });
    }

    public function down()
    {
        Schema::table('inf_plan_section_points', function (Blueprint $table) {
            $table->dropColumn('done');
        });
    }
}
