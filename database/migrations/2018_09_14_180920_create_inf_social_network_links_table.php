<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfSocialNetworkLinksTable extends Migration
{
    public function up()
    {
        Schema::create('inf_social_network_link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->string('img_id');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_social_network_link');
    }
}
