<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagColumnToLanguagesTable extends Migration
{
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->integer('flag_image_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });
    }
}
