<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnologias', function (Blueprint $tabla) {
           
            $tabla->engine = 'InnoDB';
            $tabla->increments('id');
            $tabla->string('nombre_tecnologia');
            $tabla->text('descripcion_tecnologia')->nulllable();
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
        Schema::drop('tecnologias');
    }
}
