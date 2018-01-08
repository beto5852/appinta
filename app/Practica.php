<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Practica extends Model
{

    protected $guarded = [];
    protected $table   = 'practicas';
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre_practica',
            ],
        ];
    }

    public function setPathAttribute($path)
    {
        if (!empty($path)) {
            // dd($path);
            $nombre = $path->getClientOriginalName();
            $this->attributes['path'] = $nombre;
            Storage::disk('img')->put($nombre, \File::get($path));
            /* $nombre_route = time().'_'.$path->getClientOriginalName();
        Storage::disk('img')->put($nombre_route, file_get_contents( $path->getRealPath() ) );*/
        }
    }
    protected $fillable = ['nombre_practica', 'contenido', 'path','tecnologia_id', 'user_id'];

     public function meses()
    {
        return $this->belongsToMany(Mes::class,'mes_practica');
    }

    public function semanas()
    {
        return $this->belongsToMany(Semana::class,'practica_semana');
    }


    public function tecnologia()
    {
        return $this->belongsTo(Tecnologia::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'practica_tag');
    }
    public function scopeSearch($query, $nombre_practica)
    {
        return $query->where('nombre_practica', 'LIKE', "%$nombre_practica%");
    }

    public function scopePublicado($query, $nombre_practica)
    {
        return $query->where('nombre_practica', 'LIKE', "%$nombre_practica%");
    }






}
