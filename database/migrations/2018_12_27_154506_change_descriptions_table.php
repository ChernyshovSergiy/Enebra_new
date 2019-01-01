<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('descriptions', function (Blueprint $table) {
            $table->unsignedInteger('image_id')->nullable()->after('desc_block_id');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->boolean('shadow')->default(0)->after('image_id');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->unsignedInteger('in_image_id_1')->nullable()->after('shadow');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->unsignedInteger('in_image_id_2')->nullable()->after('in_image_id_1');
        });


        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')
                ->on('images')->onDelete('cascade');
        });
        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('in_image_id_1')->references('id')
                ->on('images')->onDelete('cascade');
        });
        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('in_image_id_2')->references('id')
                ->on('images')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('descriptions', function (Blueprint $table) {
            //
        });
    }
}
