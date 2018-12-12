<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfPlanSectionPointsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_plan_section_points', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_done')->default(0);
            $table->json('entry')->nullable();
            $table->integer('phase_id');
            $table->integer('section_id');
            $table->integer('sort');
            $table->timestamps();
        });
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->foreign('phase_id')->references('id')
                ->on('inf_plan_phases')->onDelete('cascade');
            $table->foreign('section_id')->references('id')
                ->on('inf_plan_phase_sections')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropForeign(['phase_id']);
            $table->dropForeign(['section_id']);
        });
        Schema::dropIfExists('inf_plan_section_points');
    }
}
