<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $guarded =[];

    protected $table = 'etapas';
//    protected $fillable =['nombre_etapa','descripcion_etapa'];

    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'etapa_practica');
    }
}
