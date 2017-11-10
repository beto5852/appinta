<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    protected $table = 'cultivos';
    protected $fillable =['nombre_cultivo'];
    public function etapas()
    {
        return $this->belongsToMany('App\Etapa','ce')->withTimestamps();
    }
    public function rubro()
    {
        return $this->belongsTo('App\Rubro');
    }
    public  function variedad()
    {
        return $this->hasMany('App\Variedad');
    }
}
