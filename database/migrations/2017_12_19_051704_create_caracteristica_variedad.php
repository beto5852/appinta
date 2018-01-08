<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaVariedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristica_variedad', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->text('descripcion_caracteristica')->nullable();

            $table->integer('caracteristica_id')->unsigned()->nullable();
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onUpdate('set null');

            $table->integer('variedade_id')->unsigned()->nullable();
            $table->foreign('variedade_id')->references('id')->on('variedades')->onUpdate('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristica_variedad');
    }
}
