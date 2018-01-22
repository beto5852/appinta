<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             $roles =['admin','miembro'];

            $display_name =['administrador','miembro'];


//        $datos = array_dot(['Seleccione un mes','Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto','Septiembre','Octubre', 'Noviembre','Diciembre']);

//        $meses = array_except($datos, ['0']);

        for ($i = 0 ; $i < 2 ; $i++) {
            \DB::table('roles')->insert(array(
                'name' => $roles[$i],
                'display_name' =>  $display_name[$i],
            ));

        }

        \DB::table('role_user')->insert(array(
            'role_id' => '1',
            'user_id'      => '1',
        ));

        
//        for ($i = 0 ; $i < 4 ; $i++) {
//            \DB::table('role_user')->insert(array(
//                'role_id' => App\Role::all()->random()->id,
//                'user_id'      => App\User::all()->random()->id,
//            ));
//
//        }



    }
}
