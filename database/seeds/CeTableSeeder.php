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
            \DB::table('ce')->insert(array(
                'ce_id_cultivo' => App\Cultivo::all()->random()->id,
                'ce_id_etapa' => App\Etapa::all()->random()->id
            ));
        }
    }
}
