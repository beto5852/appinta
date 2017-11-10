<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    protected $table = 'etapas';
    protected $fillable =['nombre_etapa','descripcion_etapa'];
    public function cultivos()
    {
        return $this->belongsToMany('App\Cultivo','ce')->withPivot('ce_id_cultivo')->withTimestamps();
    }
}
