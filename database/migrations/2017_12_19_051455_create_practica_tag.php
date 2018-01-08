<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticaTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practica_tag', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('practica_id')->unsigned()->nullable();
            $table->foreign('practica_id')->references('id')->on('practicas')->onUpdate('set null');

            $table->integer('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('set null');

          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practica_tag');
    }
}
