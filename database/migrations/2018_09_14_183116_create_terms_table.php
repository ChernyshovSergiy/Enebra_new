<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('left_textarea')->nullable();
            $table->text('right_textarea')->nullable();
            $table->text('down_textarea')->nullable();
            $table->integer('views_count')->default(0);
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
