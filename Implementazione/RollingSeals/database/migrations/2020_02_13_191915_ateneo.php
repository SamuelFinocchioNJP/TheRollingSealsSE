<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ateneo extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ateneo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('citta');
            $table->string('indirizzo')->nullable();

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
        Schema::dropIfExists('ateneo');
    }
}
