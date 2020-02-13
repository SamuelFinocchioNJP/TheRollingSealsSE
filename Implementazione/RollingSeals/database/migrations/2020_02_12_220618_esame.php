<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Esame extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('esame', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('docente')->nullable();
            $table->integer('cfu');

            $table->bigInteger('corso_id');
            $table->foreign('corso_id')->references('id')->on('corso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('esame');
    }
}
