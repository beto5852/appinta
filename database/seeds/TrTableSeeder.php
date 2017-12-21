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
            \DB::table('rubro_tecnologia')->insert(array(
                'rubro_id' => App\Rubro::all()->random()->id,
                'tecnologia_id' => App\Tecnologia::all()->random()->id
            ));
        }
    }
}
