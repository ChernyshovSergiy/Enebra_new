<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortColumnToInfVideosTable extends Migration
{
    public function up()
    {
        Schema::table('inf_videos', function (Blueprint $table) {
            $table->integer('sort');
        });
    }

    public function down()
    {
        Schema::table('inf_videos', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
}
