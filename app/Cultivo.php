<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    protected $table = 'cultivos';
    protected $fillable =['nombre_cultivo'];
    public function etapas()
    {
        return $this->belongsToMany(Etapa::class);
    }
    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }
    public  function variedades()
    {
        return $this->hasMany(variedad::class);
    }
}
