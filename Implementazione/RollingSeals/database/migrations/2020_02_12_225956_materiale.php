<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materiale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('formato')->nullable();
            $table->integer('n_pagine');
            $table->string('lingua')->nullable();
            $table->string('contenuto')->nullable();
            
            /// Proprietario
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            /// Esame
            $table->bigInteger('esame_id');
            $table->foreign('esame_id')->references('id')->on('esame');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiale');
    }
}
