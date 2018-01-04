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
            $tabla->text('contenido')->nullable();
            $tabla->string('slug');
            $tabla->string('path')->nullable();
            
            $tabla->integer('tecnologia_id')->unsigned()->nullable();
            $tabla->foreign('tecnologia_id')->references('id')->on('tecnologias')->onDelete('set null');

            $tabla->integer('user_id')->unsigned()->nullable();
            $tabla->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
