<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPS extends Model
{
    protected $table    = 'mese_practica_semana';

    protected $fillable = ['mes_id','practica_id','semana_id'];

    public function meses()
    {
        return $this->belongsTo(Mes::class);
    }

    public function practicas()
    {
        return $this->belongsTo(Practica::class);
    }
    public function semanas()
    {
        return $this->belongsTo(Semana::class);
    }

}
