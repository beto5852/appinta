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
            $tabla->mediumText('textomedio')->nullable();
            $tabla->text('contenido')->nullable();
            $tabla->mediumText('video')->nullable();
            $tabla->string('slug');
            $tabla->string('path')->nullable();
            $tabla->unsignedInteger('cultivo_id')->nullable();
            $tabla->unsignedInteger('rubro_id')->nullable();
            $tabla->unsignedInteger('tecnologia_id')->nullable();
            $tabla->unsignedInteger('user_id')->nullable();
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
