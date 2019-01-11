<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    public function up(): void
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->json('content')->nullable();
            $table->integer('views_count')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
}
