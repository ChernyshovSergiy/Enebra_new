<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfIntroductionsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
        });
    }
}
