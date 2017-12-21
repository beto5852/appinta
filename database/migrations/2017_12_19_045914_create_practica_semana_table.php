<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticaSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica_semana', function (Blueprint $table) {
            $table->increments('id');
              $table->integer('practica_id')->unsigned()->nullable();
            $table->foreign('practica_id')->references('id')->on('practicas')->onDelete('set null');

            $table->integer('semana_id')->unsigned()->nullable();
            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('set null');
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
        Schema::dropIfExists('practica_semana');
    }
}
