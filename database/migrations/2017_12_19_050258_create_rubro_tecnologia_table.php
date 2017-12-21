<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubroTecnologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubro_tecnologia', function (Blueprint $table) {
            $table->increments('id');

              $table->integer('rubro_id')->unsigned()->nullable();
            $table->foreign('rubro_id')->references('id')->on('rubros')->onDelete('set null');

            $table->integer('tecnologia_id')->unsigned()->nullable();
            $table->foreign('tecnologia_id')->references('id')->on('tecnologias')->onDelete('set null');
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
        Schema::dropIfExists('rubro_tecnologia');
    }
}
