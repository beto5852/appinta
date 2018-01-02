<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';
    protected $fillable = ['nombre_tags'];
    
    public function practicas()
    {
        return $this->belongsToMany(Practica::class,'practicas');
    }
    public function scopeSearch($query,$nombre_tags){
        return $query->where('nombre_tags','LIKE',"%$nombre_tags%" );
    }
}
