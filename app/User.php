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

       
    protected $fillable = ['name', 'email','password', 'sexo','edad','ocupacion','pais','notas', 'telefono','type','perfil','active'];
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

    public function profiles(){
        return $this->hasMany(SocialProfile::class);
    }

    public function getPerfilAtttribute(){

        return $this->profiles()->first()->avatar();
    }


//     public function sendPasswordResetNotification($token){
//         $this->notify(new ResetPasswordNotification($token));
//     }
}
