<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfVideoGroupSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_video_group_sections', function (Blueprint $table) {
            $table->unsignedInteger('video_group_id')->change();
            $table->foreign('video_group_id')->references('id')->on('inf_video_groups');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_video_group_sections', function (Blueprint $table) {
            $table->dropForeign(['video_group_id']);
            $table->dropForeign(['language_id']);
        });
    }
}
