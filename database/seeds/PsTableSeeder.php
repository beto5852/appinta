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
            \DB::table('ps')->insert(array(
                'ps_id_practica' => App\Practica::all()->random()->id,
                'ps_id_semana' => App\Semana::all()->random()->id
            ));
        }
    }
}
