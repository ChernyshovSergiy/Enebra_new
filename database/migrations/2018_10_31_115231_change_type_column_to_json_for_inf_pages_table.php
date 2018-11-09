<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeColumnToJsonForInfPagesTable extends Migration
{
    public function up()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->json('text')->after('slug')->nullable();
        });
    }

    public function down()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropColumn('text');
        });
    }
}
