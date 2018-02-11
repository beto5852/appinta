<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EtapaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $etapas =['Siembra','pre-siembra', 'post-cosecha','vegetativa','Pre-almacenamiento','Almacenamiento','Desarrollo Vegetativo', 'Establecimiento de semilleros','coseha',
            'Floracion', 'Tuberazcion','Senescencia','Lactancia y engorde','Post-destete','Manejo de potreros','Naciencia','Sanidad Animal','Alimentacion'];

        $total = count($etapas);
        $faker = Faker::create();

        for ($i = 0 ; $i < $total ; $i++) {

            \DB::table('etapas')->insert(array(

                'nombre_etapa' => $etapas[$i],
                'descripcion_etapa' => $faker->paragraph,

            ));

        }
    }
}
