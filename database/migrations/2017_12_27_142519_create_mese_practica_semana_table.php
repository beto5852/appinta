<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesePracticaSemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mes_practica_semana', function (Blueprint $table) {
          
           $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('mes_id');
            $table->unsignedInteger('practica_id');
            $table->unsignedInteger('semana_id');
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
        Schema::dropIfExists('mes_practica_semana');
    }
}
