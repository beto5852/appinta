<?php

use Illuminate\Database\Seeder;

class MsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<10; $i++) {
            \DB::table('mes_semana')->insert(array(
                'mes_id' => App\Mes::all()->random()->id,
                'semana_id' => App\Semana::all()->random()->id
            ));
        }
    }
}
