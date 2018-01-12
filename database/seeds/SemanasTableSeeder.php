<?php

use Illuminate\Database\Seeder;

class SemanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $semanas =['semana 1','semana 2','semana 3','semana 4'];


        for ($j = 1; $j < 5; $j++) {
            \DB::table('semanas')->insert(array(
                'nombre_semana' => 'Semana '.$j,

            ));
        }
    }
}
