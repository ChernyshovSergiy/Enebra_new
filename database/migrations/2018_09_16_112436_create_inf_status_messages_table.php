<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfStatusMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('inf_status_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_status_messages');
    }
}
