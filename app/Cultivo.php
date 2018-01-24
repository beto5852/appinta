<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{

    protected $guarded = [];
    protected $table = 'cultivos';
    protected $fillable = ['id','nombre_cultivo','rubro_id'];

    public function etapas()
    {
        return $this->belongsTo(Etapa::class);
    }
    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }
    public function variedades()
    {   
        return $this->hasMany(Variedad::class, 'variedade_id');
    }
}
