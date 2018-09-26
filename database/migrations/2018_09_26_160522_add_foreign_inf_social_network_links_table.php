<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfSocialNetworkLinksTable extends Migration
{
    public function up()
    {
        Schema::table('inf_social_network_links', function (Blueprint $table) {
            $table->unsignedInteger('image_id')->change();
            $table->foreign('image_id')->references('id')->on('images');

        });
    }

    public function down()
    {
        Schema::table('inf_social_network_links', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
        });
    }
}
