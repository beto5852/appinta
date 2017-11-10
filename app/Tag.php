<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';
    protected $fillable = ['nombre_tags'];
    public function practicas()
    {
        return $this->belongsToMany('App\Practica','pt','tag_id','practica_id');
    }
    public function scopeSearch($query,$nombre_tags){
        return $query->where('nombre_tags','LIKE',"%$nombre_tags%" );
    }
}
