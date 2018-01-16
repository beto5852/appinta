<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $guarded = [];
    protected $tabla   = 'roles';

    protected $fillable = ['name','display_name','descripcion'];


    // esta es la relacion donde el rol esta asiganado a muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class,'role_user');
    }
}
