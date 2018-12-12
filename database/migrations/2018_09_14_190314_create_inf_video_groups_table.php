<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfVideoGroupsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_video_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id')->nullable();
            $table->json('content')->nullable();
            $table->timestamps();
        });
        Schema::table('inf_video_groups', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('inf_video_groups', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });
        Schema::dropIfExists('inf_video_groups');
    }
}
