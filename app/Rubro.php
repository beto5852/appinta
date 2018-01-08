<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubros';
    protected $fillable =['nombre_rubro','descripcion_rubro'];
    
    public  function  cultivos()
    {
        return $this->hasMany(Cultivo::class);
    }
    public function tecnologias()
    {
        return $this->belongsToMany(Tecnologia::class,'rubro_tecnologia');
    }
}
