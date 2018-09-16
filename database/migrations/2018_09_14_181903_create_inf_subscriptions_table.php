<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('inf_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('token')->nullable();
            $table->integer('language_id')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inf_subscriptions');
    }
}
