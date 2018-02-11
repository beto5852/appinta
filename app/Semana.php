<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
//    protected $guarded = [];
    protected $table    = 'semanas';
    protected $fillable = ['nombre_semana'];


    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'practica_semana');
    }
}
