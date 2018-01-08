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
           
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('rubro_id');
            $table->unsignedInteger('tecnologia_id');
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
