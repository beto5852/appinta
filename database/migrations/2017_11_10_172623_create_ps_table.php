<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('ps_id_practica')->unsigned()->nullable();
            $table->foreign('ps_id_practica')->references('id')->on('practicas')->onDelete('set null');
            $table->integer('ps_id_semana')->unsigned()->nullable();
            $table->foreign('ps_id_semana')->references('id')->on('semanas')->onDelete('set null');
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
        Schema::drop('ps');
    }
}
