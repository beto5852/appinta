<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
//    protected $guarded = [];
    protected $table = 'tecnologias';
    protected $fillable =['id','nombre_tecnologia','descripcion_tecnologia'];
    

    public function practicas(){
        return $this->hasMany(Practica::class);
    }
    public function rubros()
    {
        return $this->belongsToMany(Rubro::class,'rubro_tecnologia');
    }
}
