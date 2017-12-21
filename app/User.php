<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

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


    public function setPathAttribute($perfil){
        if (!empty($perfil)){

            $nombre = $perfil->getClientOriginalName();
            $this->attributes['perfil'] = $nombre;
            //dd($nombre);

            \Storage::disk('img')->put($nombre, \File::get($perfil));
            
        }
    }

       
    protected $fillable = ['name', 'email', 'sexo','ocupacion','pais','notas', 'telefono','password','type','perfil'];
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

    public function scopeSearch($query,$name){
        return $query->where('name','LIKE',"%$name%" );
    }
}
