<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->json('text_block')->nullable();
            $table->unsignedInteger('menu_id');
            $table->integer('sort');
            $table->timestamps();
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('descriptions');
    }
}
