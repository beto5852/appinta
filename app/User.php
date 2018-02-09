<?php

namespace App;

use App\Http\Controllers\ActivationTokenController;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use App\Notifications\ResetPasswordNotification;
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
//    protected $guarded=[];
    
    protected $table = 'users';


    public function setPerfilAttribute($perfil){
        if (!empty($perfil)){

            $nombre = $perfil->getClientOriginalName();
            $this->attributes['perfil'] = $nombre;
            //dd($nombre);

            \Storage::disk('img')->put($nombre, \File::get($perfil));
            
        }
    }

       
    protected $fillable = ['name', 'email', 'sexo','ocupacion','pais','notas', 'telefono','password','type','perfil','active'];
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

    // esta es la relacion donde el usuario esta asiganado a muchos roles
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }


    // forzamos para que pase como arreglo el parametro
    public function hasRoles(array $roles){

        // para acceder a esta funcion de  verificacio al usuario realiza esto if(auth()->user()->hasRoles('admin')) en tu blade

        foreach ($roles as $role){

            //recorremos el arreglo si el role es igual retorna verdadero en este caso verifica si el
            //parametro name del modelo Role::claas es verdadero, despues hace el otro recorrido y verifica si es verdadero

            foreach ($this->roles as $userRole){

                if($userRole->name == $role)
                {
                    return true;
                }
            }
        }
        return false;
    }


    public function practicas(){
        return $this->hasMany(Practica::class);
    }

    public function scopeSearch($query,$name){
        return $query->where('name','LIKE',"%$name%" );
    }

    public function activate($token){
        $this->update(['active' => true]);
        Auth::login($this);
        $this->token->delete();
    }
    public function token(){
        return $this->hasOne(ActivationToken::class);
    }

    public function generartoken(){
        $this->token()->create([
            'token'  => str_random(60),
        ]);
        return $this;
    }


//     public function sendPasswordResetNotification($token){
//         $this->notify(new ResetPasswordNotification($token));
//     }
}
