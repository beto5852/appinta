<?php

use Illuminate\Database\Seeder;

class PtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i<10; $i++) {
            \DB::table('pt')->insert(array(
                'practica_id' => App\Practica::all()->random()->id,
                'tag_id' => App\Tag::all()->random()->id
            ));
        }
    }
}
