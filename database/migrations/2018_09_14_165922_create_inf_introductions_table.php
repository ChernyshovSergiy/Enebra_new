<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfIntroductionsTable extends Migration
{

    public function up()
    {
        Schema::create('inf_introductions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('text');
            $table->string('replica');
            $table->string('conclusion');
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_introductions');
    }
}
