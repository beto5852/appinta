<?php

namespace App;

use App\Events\CrearPractica;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Practica extends Model
{
    protected $table = 'practicas';
    use Sluggable;

     public function sluggable(){
        return [
            'slug' => [
                'source' => 'nombre_practica'
            ]
        ];
    }
    public function setPathAttribute($path){
        if (!empty($path)){
            // dd($path);
            $nombre = $path->getClientOriginalName();
            $this->attributes['path'] = $nombre;
            \Storage::disk('img')->put($nombre, \File::get($path));
            /* $nombre_route = time().'_'.$path->getClientOriginalName();
             Storage::disk('img')->put($nombre_route, file_get_contents( $path->getRealPath() ) );*/
        }
    }
    protected $fillable = ['nombre_practica','contenido','path','tags','practica_id_tecnologia','practica_id_usuario'];
    //protected $fillable = ['nombre_practica','contenido','path','tags','slug'];




    public function semana()
    {
        return $this->belongsToMany('App\Semana')->withPivot('ps_id_semana')->withTimestamps();
    }
    public function tecnologia()
    {
        return $this->belongsTo('App\Tecnologia','practica_id_tecnologia');
    }
    public function user()
    {
        return $this->belongsTo('App\User','practica_id_usuario');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag','pt','practica_id','tag_id');
    }
    public function scopeSearch($query,$nombre_practica){
        return $query->where('nombre_practica','LIKE',"%$nombre_practica%" );
    }
}
