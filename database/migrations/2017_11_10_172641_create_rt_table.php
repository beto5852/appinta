<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('rt_id_rubro')->unsigned()->nullable();
            $table->foreign('rt_id_rubro')->references('id')->on('rubros')->onDelete('set null');
            $table->integer('rt_id_tecnologia')->unsigned()->nullable();
            $table->foreign('rt_id_tecnologia')->references('id')->on('tecnologias')->onDelete('set null');

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
        Schema::drop('rt');
    }
}
