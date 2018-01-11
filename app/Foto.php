<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $guarded = [];
    protected $table   = 'fotos';
    protected $fillable = ['url','practica_id'];



}
