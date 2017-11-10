<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubros';
    protected $fillable =['nombre_rubro','descripcion_rubro'];
    public  function  cultivos()
    {
        return $this->hasMany('App\Cultivo');
    }
    public function tecnologias()
    {
        return $this->belongsToMany('\App\Tecnologia','rt')->withPivot('rt_id_tecnologia')->withTimestamps();
    }
}
