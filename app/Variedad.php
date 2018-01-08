<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{

    protected $primary = 'cultivo_id';

    protected $table = 'variedades';

    protected $fillable = ['nombre_variedad', 'cultivo_id'];

    public function caracteristicas()
    {
        return $this->belongsToMany(Caracteristica::class,'caracteristica_variedad');
    }
    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class);
    }

}
