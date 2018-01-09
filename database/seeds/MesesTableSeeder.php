<?php

use Illuminate\Database\Seeder;

class MesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $meses =array('Seleccione un mes','Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto','Septiembre','Octubre', 'Noviembre','Diciembre');

//        foreach($meses as $key => $mes){
//
//            \DB::table('meses')->insert(array(
//                'nombre_mes' => $mes[$key],
//            ));
//
//        }

        for ($i = 1 ; $i < 14 ; $i++) {
            \DB::table('meses')->insert(array(
                'nombre_mes' => $meses[$i],
            ));

        }
    }
}
