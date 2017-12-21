<?php

use Illuminate\Database\Seeder;

class CeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++) {
            \DB::table('cultivo_etapa')->insert(array(
                'cultivo_id' => App\Cultivo::all()->random()->id,
                'etapa_id' => App\Etapa::all()->random()->id
            ));
        }
    }
}
