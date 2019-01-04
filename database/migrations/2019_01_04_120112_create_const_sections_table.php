<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstSectionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('const_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title')->nullable();
            $table->unsignedInteger('menu_id');
            $table->integer('sort');
            $table->timestamps();
        });
        Schema::table('const_sections', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus');
        });
    }

    public function down(): void
    {
        Schema::table('const_sections', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });
        Schema::dropIfExists('const_sections');
    }
}
