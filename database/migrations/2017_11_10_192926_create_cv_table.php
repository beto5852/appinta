<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descripcion_caracteristica')->nullable();
            $table->integer('cv_id_caracteristica')->unsigned()->nullable();
            $table->foreign('cv_id_caracteristica')->references('id')->on('caracteristicas')->onDelete('set null');
            $table->integer('cv_id_variedad')->unsigned()->nullable();
            $table->foreign('cv_id_variedad')->references('id')->on('variedades')->onDelete('set null');
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
        Schema::drop('cv');
    }
}
