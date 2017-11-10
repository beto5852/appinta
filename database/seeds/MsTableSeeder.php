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
            \DB::table('ms')->insert(array(
                'ms_id_mes' => App\Mes::all()->random()->id,
                'ms_id_semana' => App\Semana::all()->random()->id
            ));
        }
    }
}
