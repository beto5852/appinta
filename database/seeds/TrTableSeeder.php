<?php

use Illuminate\Database\Seeder;

class TrTableSeeder extends Seeder
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
            \DB::table('rt')->insert(array(
                'rt_id_rubro' => App\Rubro::all()->random()->id,
                'rt_id_tecnologia' => App\Tecnologia::all()->random()->id
            ));
        }
    }
}
