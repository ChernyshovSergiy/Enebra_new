<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnLanguageIdFromInfPagesTable extends Migration
{
    public function up()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->dropForeign('inf_pages_language_id_foreign');
            $table->dropColumn('language_id');
        });
    }

    public function down()
    {
        Schema::table('inf_pages', function (Blueprint $table) {
            $table->unsignedInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')
                ->on('languages')->onDelete('cascade');
        });
    }
}
