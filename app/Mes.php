<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table    = 'meses';
    protected $fillable = ['nombre_mes'];
//
//    public function mps()
//    {
//        return $this->hasMany(MPS::class,'mese_practica_semana');
//    }

    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'mese_practica_semana')->withPivot('semana_id');
    }
    public function semanas()
    {
        return $this->belongsToMany(Semana::class, 'mese_practica_semana')->withPivot('practica_id');
    }
//    public function scopePublished($query)
//    {
//        return $query->whereNotNull('nombre_mes');
//    }
//    public function mesesPublished()
//    {
//        return $this->belongsToMany('Mes')->published();
//        // or this way:
//        // return $this->posts()->published();
//    }

    
}
