<?php

use Illuminate\Database\Seeder;

class MsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            \DB::table('mes_practica')->insert(array(
                'mes_id'      => App\Mes::all()->random()->id,
                'practica_id' => App\Practica::all()->random()->id,
            ));     
        
        }

        for ($i = 1; $i < 10; $i++) {
            \DB::table('practica_semana')->insert(array(
                'practica_id' => App\Practica::all()->random()->id,
                'semana_id'   => App\Semana::all()->random()->id,
            ));

        }    
    }
}
