<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('ce_id_cultivo')->unsigned()->nullable();
            $table->foreign('ce_id_cultivo')->references('id')->on('cultivos')->onDelete('set null');
            $table->integer('ce_id_etapa')->unsigned()->nullable();
            $table->foreign('ce_id_etapa')->references('id')->on('etapas')->onDelete('set null');
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
        Schema::drop('ce');
    }
}
