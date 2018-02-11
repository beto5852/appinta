<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubros';
    protected $fillable =['id','nombre_rubro','descripcion_rubro'];

    public  function practicas()
    {
        return $this->hasMany(Practica::class);
    }
}
