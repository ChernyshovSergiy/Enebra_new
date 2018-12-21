<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurposesTable extends Migration
{
    public function up(): void
    {
        Schema::create('purposes', function (Blueprint $table) {
            $table->increments('id');
            $table->json('goal')->nullable();
            $table->unsignedInteger('menu_id');
            $table->integer('sort');
            $table->timestamps();
        });

        Schema::table('purposes', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('purposes', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });

        Schema::dropIfExists('purposes');
    }
}
