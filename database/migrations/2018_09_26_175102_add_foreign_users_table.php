<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('citizen_country_id')->change();
            $table->foreign('citizen_country_id')->references('id')->on('countries');

            $table->unsignedInteger('biometric_photo_id')->change();
            $table->foreign('biometric_photo_id')->references('id')->on('images');

            $table->unsignedInteger('sex_id')->change();
            $table->foreign('sex_id')->references('id')->on('sexes');

            $table->unsignedInteger('birth_country_id')->change();
            $table->foreign('birth_country_id')->references('id')->on('countries');

            $table->unsignedInteger('document_id')->change();
            $table->foreign('document_id')->references('id')->on('inf_id_documents');

            $table->unsignedInteger('avatar_id')->change();
            $table->foreign('avatar_id')->references('id')->on('images');

            $table->unsignedInteger('status_id')->change();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->unsignedInteger('language_id')->change();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['citizen_country_id']);
            $table->dropForeign(['biometric_photo_id']);
            $table->dropForeign(['sex_id']);
            $table->dropForeign(['birth_country_id']);
            $table->dropForeign(['document_id']);
            $table->dropForeign(['avatar_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['language_id']);
        });
    }
}
