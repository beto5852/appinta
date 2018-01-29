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


        $meses =['Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto','Septiembre','Octubre', 'Noviembre','Diciembre'];
       
        $total = count($meses);

//        $datos = array_dot(['Seleccione un mes','Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto','Septiembre','Octubre', 'Noviembre','Diciembre']);
        
//        $meses = array_except($datos, ['0']);
        
        for ($i = 0 ; $i < $total ; $i++) {
            \DB::table('meses')->insert(array(
                'nombre_mes' => $meses[$i],
            ));

        }
    }
}
