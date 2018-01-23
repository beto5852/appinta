<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TecnologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $tecnologias =['Producción de semilla','Conservación de Suelos y agua', 'Postcosehca','Producción animal','Manejo Integrado de plagas','Bioinsumos'];

        $total = count($tecnologias);
        $faker = Faker::create();

        for ($i = 0 ; $i < $total ; $i++) {

            \DB::table('tecnologias')->insert(array(

                'nombre_tecnologia' => $tecnologias[$i],
                'descripcion_tecnologia' => $faker->paragraph,
            ));

        }
    }
}
