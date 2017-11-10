<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('ms_id_mes')->unsigned()->nullable();
            $table->foreign('ms_id_mes')->references('id')->on('meses')->onDelete('set null');
            $table->integer('ms_id_semana')->unsigned()->nullable();
            $table->foreign('ms_id_semana')->references('id')->on('semanas')->onDelete('set null');
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
        Schema::drop('ms');
    }
}
