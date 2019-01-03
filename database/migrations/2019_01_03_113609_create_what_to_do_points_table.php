<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhatToDoPointsTable extends Migration
{
    public function up(): void
    {
        Schema::create('what_to_do_points', function (Blueprint $table) {
            $table->increments('id');
            $table->json('point')->nullable();
            $table->unsignedInteger('menu_id');
            $table->boolean('side');
            $table->integer('sort');
            $table->timestamps();
        });
        Schema::table('what_to_do_points', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')
                ->on('menus');
        });
    }

    public function down(): void
    {
        Schema::table('what_to_do_points', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
        });
        Schema::dropIfExists('what_to_do_points');
    }
}
