<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignInfContactMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('inf_contact_messages', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->change();
            $table->foreign('status_id')->references('id')->on('inf_status_messages');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('inf_contact_messages', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['language_id']);
        });
    }
}
