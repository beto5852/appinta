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
        for ($j = 0; $j < 3; $j++){
            \DB::table('semanas')->insert(array(
                'nombre_semana' => 'Semana'.' '.$j,

            ));
        }
    }
}
