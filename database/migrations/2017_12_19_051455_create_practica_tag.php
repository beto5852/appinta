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
            $table->unsignedInteger('practica_id');
            $table->unsignedInteger('tag_id');
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
        Schema::dropIfExists('practica_tag');
    }
}
