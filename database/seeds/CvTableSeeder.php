<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for($i = 0; $i<10; $i++) {
            \DB::table('caracteristica_variedad')->insert(array(
                'descripcion_caracteristica' => $faker->sentence(20),
                'caracteristica_id' => App\Caracteristica::all()->random()->id,
                'variedade_id' => App\Variedad::all()->random()->id
            ));
        }
    }
}
