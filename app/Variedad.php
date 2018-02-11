<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{

    protected $table = 'variedades';

    protected $fillable = ['nombre_variedad','caracteristica_agronomica','descripcion_caracteristica'];

    public function practicas()
    {
        return $this->hasMany(Practica::class);
    }

}
