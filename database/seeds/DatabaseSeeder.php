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
        factory('App\User','miembro',10)->create();
        $this->call(RubroTableSeeder::class);
        $this->call(TecnologiaTableSeeder::class);
        $this->call(CultivoTableSeeder::class);
        $this->call(EtapaTableSeeder::class);
        $this->call(VariedadTableSeeder::class);
        factory('App\Practica',5)->create();
        $this->call(MesesTableSeeder::class);
        $this->call(SemanasTableSeeder::class);
        $this->call(EtapaPracticaTableSeeder::class);
        $this->call(PracticaVariedadSeeder::class);
        
        Model::unguard();

    }
}
