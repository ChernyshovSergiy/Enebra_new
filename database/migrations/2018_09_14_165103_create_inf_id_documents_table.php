<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfIdDocumentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('inf_id_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inf_id_documents');
    }
}
