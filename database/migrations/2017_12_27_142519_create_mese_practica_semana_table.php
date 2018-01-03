<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesePracticaSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mese_practica_semana', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('mes_id')->unsigned()->nullable();
            $table->foreign('mes_id')->references('id')->on('meses')->onUpdate('set null');

            $table->integer('practica_id')->unsigned()->nullable();
            $table->foreign('practica_id')->references('id')->on('practicas')->onUpdate('set null');

            $table->integer('semana_id')->unsigned()->nullable();
            $table->foreign('semana_id')->references('id')->on('semanas')->onUpdate('set null');
            
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
        Schema::dropIfExists('mese_practica_semana');
    }
}