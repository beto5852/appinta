<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->integer('nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('pais')->nullable();
            $table->text('notas')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
//            $table->enum('type',['miembro','admin'])->default('miembro');
            $table->string('perfil')->nullable();
            $table->boolean('active')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
