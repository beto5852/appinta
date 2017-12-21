<?php

use Illuminate\Database\Seeder;

class PsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker = Faker::create();*/
        for($i = 0; $i<10; $i++) {
            \DB::table('practica_semana')->insert(array(
                'practica_id' => App\Practica::all()->random()->id,
                'semana_id' => App\Semana::all()->random()->id
            ));
        }
    }
}
