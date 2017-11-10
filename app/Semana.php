<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table = 'semanas';
    protected $fillable = ['nombre_semana'];
    public function mes()
    {
        return $this->belongsToMany('App\Mes','ms')->withPivot('ms_id_mes')->withTimestamps();
    }
    public  function practicas()
    {
        return $this->belongsToMany('App\Practica','ps')->withPivot('ps_id_semana')->withTimestamps();
    }
}
