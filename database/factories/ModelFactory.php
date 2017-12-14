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
        'email' => 'alexo2407@gmail.com',
        'password' => bcrypt('secret'),
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
        'type'=> 'miembro',
        'remember_token' => str_random(10),
    ];
});

/*****************Telefonos****************************************/
/*$factory->define(App\Telefono::class, function (Faker\Generator $faker) {
    return [
        'telefono' => $faker->phoneNumber,
        'telefono_id_usuario'=> App\User::all()->random()->id,
    ];
});*/

/************************Rubro************************************/
$factory->define(App\Rubro::class, function (Faker\Generator $faker) {
    return [
        'nombre_rubro' => $faker->sentence,
        'descripcion_rubro' => $faker->paragraph,
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
        'cultivos_id_rubro' => App\Rubro::all()->random()->id,
    ];
});
/************************Etapas************************************/
$factory->define(App\Etapa::class, function (Faker\Generator $faker) {
    return [
        'nombre_etapa' => $faker->sentence,
        'descripcion_etapa' => $faker->paragraph,
    ];
});
/***************************variedad**********************************************************/
$factory->define(App\Variedad::class, function (Faker\Generator $faker) {
    return [
        'nombre_variedad' => $faker->sentence,
        'variedada_id_cultivo'=> App\Cultivo::all()->random()->id,
    ];
});
/***************************Caracteristica**********************************************************/
$factory->define(App\Caracteristica::class, function (Faker\Generator $faker) {
    return [
        'nombre_caracteristica' => $faker->sentence,

    ];
});
/************************Practicas***************************************************/
$factory->define(App\Practica::class, function (Faker\Generator $faker) {
    return [
        'nombre_practica' => $faker->sentence,
        'contenido' => $faker->paragraph,
        'practica_id_tecnologia'=> App\Tecnologia::all()->random()->id,
        'practica_id_usuario' => App\User::all()->random()->id,
    ];
});
/***************************Tags**********************************************************/
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'nombre_tags' => $faker->word,
    ];
});