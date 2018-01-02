<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table    = 'semanas';
    protected $fillable = ['nombre_semana'];

    public function mps()
    {
        return $this->belongsToMany(MPS::class,'mese_practica_semana');
    }

    public function meses()
    {
        return $this->belongsToMany(Mes::class,'mese_practica_semana');
    }
    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'mese_practica_semana');
    }
}
