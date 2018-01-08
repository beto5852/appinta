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
            $table->unsignedInteger('caracteristica_id');
            $table->unsignedInteger('variedade_id');
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
