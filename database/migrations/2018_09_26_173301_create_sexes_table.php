<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexesTable extends Migration
{

    public function up()
    {
        Schema::create('sexes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('language_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sexes');
    }
}
