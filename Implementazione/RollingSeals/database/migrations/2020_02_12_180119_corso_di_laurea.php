<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorsoDiLaurea extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('corso_di_laurea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('tipologia');
            $table->integer('durata'); // Hours

            $table->bigInteger('ateneo_id');
            $table->foreign('ateneo_id')->references('id')->on('ateneo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('corso_di_laurea');
    }
}
