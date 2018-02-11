<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $guarded = [];
    protected $table    = 'meses';
    protected $fillable = ['nombre_mes'];


    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'mes_practica');
    }
    

    
}
