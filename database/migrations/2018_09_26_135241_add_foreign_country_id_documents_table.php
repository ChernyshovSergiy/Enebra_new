<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCountryIdDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('country_id_documents', function (Blueprint $table) {
            $table->unsignedInteger('country_id')->change();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->unsignedInteger('document_id')->change();
            $table->foreign('document_id')->references('id')->on('inf_id_documents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('country_id_documents', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['document_id']);
        });
    }
}
