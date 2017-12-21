<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mes_semana', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('mes_id')->unsigned()->nullable();
            $table->foreign('mes_id')->references('id')->on('meses')->onDelete('set null');

            $table->integer('semana_id')->unsigned()->nullable();
            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('set null');
            
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
        Schema::dropIfExists('mes_semana');
    }
}
