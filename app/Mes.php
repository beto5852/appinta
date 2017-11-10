<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = 'meses';
    protected $fillable = ['nombre_mes'];

    public function semanas()
    {
        return $this->belongsToMany('App\Semana','ms')->withPivot('ms_id_semana')->withTimestamps();
    }
}
