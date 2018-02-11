<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VariedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        $variedades =['NB-S','NB-6', 'NB-9043','Nutrinta Amarillo','NUTRADER', 'H-INTA 991','Mazorca de oro'];

        $total = count($variedades);
        $faker = Faker::create();

        for ($i = 0 ; $i < $total; $i++) {

            \DB::table('variedades')->insert(array(

                'nombre_variedad' => $variedades[$i],
                'caracteristica_agronomica' => $faker->sentence,
                'descripcion_caracteristica' => $faker->sentence,
            ));

        }
    }
}
