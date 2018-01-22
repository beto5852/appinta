<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory('App\User','admin')->create();
//        factory('App\User','miembro',10)->create();
        //factory('App\Telefono',13)->create();
        factory('App\Rubro',5)->create();
        factory('App\Tecnologia',5)->create();
        factory('App\Cultivo',5)->create();
        factory('App\Etapa',5)->create();
        factory('App\Variedad',5)->create();
        factory('App\Caracteristica',5)->create();
        factory('App\Practica',5)->create();
        factory('App\Tag',5)->create();
        $this->call(MesesTableSeeder::class);
        $this->call(SemanasTableSeeder::class);
        // $this->call(PracticaTableSeeder::class);
        $this->call(TrTableSeeder::class);          
       // $this->call(PsTableSeeder::class);
//        $this->call(MsTableSeeder::class);
        $this->call(CeTableSeeder::class);
        $this->call(CvTableSeeder::class);
        $this->call(PtTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        
        Model::unguard();

    }
}
