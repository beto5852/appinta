<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'sexo', 'password','type'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /* public function notificaciones(){
         return $this->hasMany('App\Notificacion');
     }*/

    public function practicas(){
        return $this->hasMany(Practica::class);
    }

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function scopeSearch($query,$name){
        return $query->where('name','LIKE',"%$name%" );
    }
}
