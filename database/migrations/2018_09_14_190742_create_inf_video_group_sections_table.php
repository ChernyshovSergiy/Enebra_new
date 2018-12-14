<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideoGroupSectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_video_group_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title')->nullable();
            $table->unsignedInteger('video_group_id');
            $table->timestamps();
        });

        Schema::create('inf_video_group_sections', function (Blueprint $table) {
            $table->foreign('video_group_id')->references('id')
                ->on('inf_video_groups')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::create('inf_video_group_sections', function (Blueprint $table) {
            $table->dropForeign(['video_group_id']);
        });

        Schema::dropIfExists('inf_video_group_sections');
    }
}
