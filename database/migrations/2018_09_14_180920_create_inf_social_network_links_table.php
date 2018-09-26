<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfSocialNetworkLinksTable extends Migration
{
    public function up()
    {
        Schema::create('inf_social_network_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('link');
            $table->string('image_id');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_social_network_links');
    }
}
