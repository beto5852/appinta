<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $table = 'tecnologias';
    protected $fillable =['nombre_tecnologia','descripcion_tecnologia'];
    public function practicas(){
        return $this->hasMany('APP\Practica');
    }
    public function rubros()
    {
        return $this->belongsToMany('App\Rubro','rt')->withPivot('rt_id_rubro')->withTimestamps();
    }
}
