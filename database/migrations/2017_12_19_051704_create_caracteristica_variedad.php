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

            $table->increments('id');

            $table->string('descripcion_caracteristica')->nullable();

            $table->integer('caracteristica_id')->unsigned()->nullable();
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onDelete('set null');
            
            $table->integer('variedad_id')->unsigned()->nullable();
            $table->foreign('variedad_id')->references('id')->on('variedades')->onDelete('set null');

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
        Schema::dropIfExists('caracteristica_variedad');
    }
}
