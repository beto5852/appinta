<?php

use Illuminate\Database\Seeder;

class EtapaPracticaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            \DB::table('etapa_practica')->insert(array(
                'etapa_id' => App\Etapa::all()->random()->id,
                'practica_id' => App\Practica::all()->random()->id,
            ));
        }
    }
}
