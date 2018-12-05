<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeColumnForInfIntroductionsTable extends Migration
{
    public function up()
    {
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->text('sub_title')->change();
            $table->text('text')->change();
            $table->text('replica')->change();
            $table->text('conclusion')->change();

        });
    }

    public function down()
    {
        Schema::table('inf_introductions', function (Blueprint $table) {
            $table->string('sub_title')->change();
            $table->string('text')->change();
            $table->string('replica')->change();
            $table->string('conclusion')->change();
        });
    }
}
