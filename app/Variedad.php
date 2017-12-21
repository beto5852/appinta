<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table = 'variedades';
    
    protected $fillable =['nombre_variedad'];
    
    public  function caracteristicas()
    {
        return $this->belongsToMany(Caracteristica::class);
    }
    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class);
    }
}
