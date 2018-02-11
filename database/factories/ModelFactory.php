<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/****************************************************************************/
$factory->defineAs(App\User::class,'admin', function (Faker\Generator $faker) {
    return [
        'name' => 'Alberto Calero Obando',
        'sexo' => 'masculino',
        'email' => 'alexo2407@gmail.com',
        'password' => bcrypt('secret'),
        'active' => 1,
        'type'=> 'admin',
        'remember_token' => str_random(10),
    ];
});

/**************************Usuario miembro********************************/
$factory->defineAs(App\User::class,'miembro', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'active' => 1,
        'type'=> 'miembro',
        'remember_token' => str_random(10),
    ];
});

/************************Rubro************************************/
$factory->define(App\Rubro::class, function (Faker\Generator $faker) {
    return [
        'nombre_rubro' => $faker->sentence,
        'descripcion_rubro' => $faker->paragraph,
    ];
});


/***************************variedad**********************************************************/
$factory->define(App\Variedad::class, function (Faker\Generator $faker) {
    return [
        'nombre_variedad' => $faker->sentence,
    ];
});


/************************Tecnologia************************************/
$factory->define(App\Tecnologia::class, function (Faker\Generator $faker) {
    return [
        'nombre_tecnologia' => $faker->sentence,
        'descripcion_tecnologia' => $faker->paragraph,
    ];
});

/************************Cultivos************************************/
$factory->define(App\Cultivo::class, function (Faker\Generator $faker) {
    return [
        'nombre_cultivo' => $faker->sentence,
        'descripcion_cultivo' => $faker->paragraph,

    ];
});
/************************Etapas************************************/
$factory->define(App\Etapa::class, function (Faker\Generator $faker) {
    return [
        'nombre_etapa' => $faker->sentence,
        'descripcion_etapa' => $faker->paragraph,
    ];
});

/************************Practicas***************************************************/
$factory->define(App\Practica::class, function (Faker\Generator $faker) {
    return [
        'nombre_practica' => $faker->sentence,
        'textomedio' => $faker->sentence,
        'contenido' => $faker->paragraph,
        'cultivo_id'=> App\Cultivo::all()->random()->id,
        'rubro_id'=> App\Rubro::all()->random()->id,
        'tecnologia_id'=> App\Tecnologia::all()->random()->id,
        'user_id'=> App\User::all()->random()->id,
        'variedad_id' => App\User::all()->random()->id,
    ];
});