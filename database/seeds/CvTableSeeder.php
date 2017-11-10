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
            \DB::table('cv')->insert(array(
                'descripcion_caracteristica' => $faker->sentence(20),
                'cv_id_caracteristica' => App\Caracteristica::all()->random()->id,
                'cv_id_variedad' => App\Variedad::all()->random()->id
            ));
        }
    }
}
