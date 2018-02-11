<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $guarded = [];
    protected $table = 'rubros';
    
//    protected $fillable =['nombre_rubro','descripcion_rubro'];

    public  function practicas()
    {
        return $this->hasMany(Practica::class);
    }
}
