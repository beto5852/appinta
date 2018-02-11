<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{

//    protected $guarded = [];

    protected $table = 'cultivos';
    
    protected $fillable = ['nombre_cultivo','rubro_id'];

    public  function practicas()
    {
        return $this->hasMany(Practica::class);
    }
 
}
