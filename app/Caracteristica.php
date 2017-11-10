<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table = 'caracteristicas';

    protected $fillable =['nombre_caracteristica'];

    public  function variedades()
    {
        return $this->belongsToMany('App\Variedad','cv')->withPivot('cv_id_variedad','descripcion_caracteristica')->withTimestamps();
    }
}
