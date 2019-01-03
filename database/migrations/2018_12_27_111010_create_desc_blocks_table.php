<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescBlocksTable extends Migration
{

    public function up(): void
    {
        Schema::create('desc_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('menu_id');
            $table->integer('sort');
            $table->timestamps();
        });

        Schema::table('desc_blocks', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus');
        });
    }

    public function down(): void
    {
        Schema::table('desc_blocks', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('desc_blocks');
    }
}
