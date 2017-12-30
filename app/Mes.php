<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table    = 'meses';
    protected $fillable = ['nombre_mes'];

    public function practicas()
    {
        return $this->belongsToMany(Practica::class, 'mese_practica_semana');
    }
    public function semanas()
    {
        return $this->belongsToMany(Semana::class, 'mese_practica_semana');
    }

}
