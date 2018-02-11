<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CultivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        $cultivos =['Arroz','Maiz', 'Frijol','Sorgo','pasto', 'pitaya','repollo', 'Tomate','Musacea','Piña', 'papa','Avicola','Bovino','Porcino'];

        $total = count($cultivos);
        $faker = Faker::create();

        for ($i = 0 ; $i < $total ; $i++) {

            \DB::table('cultivos')->insert(array(
                'nombre_cultivo' => $cultivos[$i],
                'descripcion_cultivo' => $faker->paragraph,
            ));

        }
    }
}
