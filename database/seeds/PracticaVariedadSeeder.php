<?php

use Illuminate\Database\Seeder;

class PracticaVariedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i = 1; $i < 10; $i++) {
        \DB::table('practica_variedad')->insert(array(
            'practica_id' => App\Practica::all()->random()->id,
            'variedad_id' => App\Variedad::all()->random()->id,
        ));
    }
    }
}
