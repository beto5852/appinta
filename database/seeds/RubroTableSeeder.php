<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RubroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $rubros =['Granos Basicos','cultivos Diversos', 'Ganaderia  mayor','ganaderia menor','Raices Y Tuberculos'];

        $total = count($rubros);
        $faker = Faker::create();

        for ($i = 0 ; $i < $total ; $i++) {

            \DB::table('rubros')->insert(array(

                'nombre_rubro' => $rubros[$i],
                'descripcion_rubro' => $faker->paragraph,
            ));

        }
    }
}
