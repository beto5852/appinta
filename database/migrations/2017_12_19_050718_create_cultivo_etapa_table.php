<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivoEtapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivo_etapa', function (Blueprint $table) {
            $table->increments('id');

             $table->integer('cultivo_id')->unsigned()->nullable();
            $table->foreign('cultivo_id')->references('id')->on('cultivos')->onDelete('set null');

            $table->integer('etapa_id')->unsigned()->nullable();
            $table->foreign('etapa_id')->references('id')->on('etapas')->onDelete('set null');

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
        Schema::dropIfExists('cultivo_etapa');
    }
}
