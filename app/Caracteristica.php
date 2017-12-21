<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table = 'caracteristicas';

    protected $fillable =['nombre_caracteristica'];

    public  function variedades()
    {
        return $this->belongsToMany(Variedad::class);
    }
}
