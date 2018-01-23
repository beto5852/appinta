<?php

use Illuminate\Database\Seeder;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $tags =['Arroz','Maiz', 'Frijol','Sorgo','pasto_n', 'pitaya','repollo', 'Tomate','Musacea','Piña', 'papa','Avicola','Bovino','Porcino','inta','cultivo','tecnologia','video','audio'];

        $total = count($tags);

        for ($i = 0 ; $i < $total ; $i++) {

            \DB::table('tags')->insert(array(

                'nombre_tags' => $tags[$i],
            ));

        }
    }
}
