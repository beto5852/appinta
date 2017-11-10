<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicas', function (Blueprint $tabla) {
            $tabla->engine = 'InnoDB';

            $tabla->increments('id');
            $tabla->string('nombre_practica');
            $tabla->text('contenido');
            $tabla->string('slug')->nullable();
            $tabla->string('path')->nullable();
            $tabla->integer('practica_id_tecnologia')->unsigned()->nullable();
            $tabla->foreign('practica_id_tecnologia')->references('id')->on('tecnologias')->onDelete('set null');

            $tabla->integer('practica_id_usuario')->unsigned()->nullable();
            $tabla->foreign('practica_id_usuario')->references('id')->on('users')->onDelete('set null');
            $tabla->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('practicas');
    }
}
