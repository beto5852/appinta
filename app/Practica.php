<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Practica extends Model
{

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
    protected $fillable = ['nombre_practica','textomedio','contenido','video','slug','path','cultivo_id','rubro_id','tecnologia_id', 'user_id','variedad_id'];

    public function etapas()
    {
        return $this->belongsToMany(Etapa::class,'etapa_practica');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class,'practica_id');
    }

    public function meses()
    {
        return $this->belongsToMany(Mes::class,'mes_practica');
    }

    public function semanas()
    {
        return $this->belongsToMany(Semana::class,'practica_semana');
    }

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class);
    }
    public function rubro()
    {
        return $this->belongsTo(Rubro::class);
    }

    public function tecnologia()
    {
        return $this->belongsTo(Tecnologia::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variedad()
    {
        return $this->belongsTo(Variedad::class);
    }

    public function scopeSearch($query, $nombre_practica)
    {
        return $query->where('nombre_practica', 'LIKE', "%$nombre_practica%");
    }

    public function setCultivoIdAttribute($cultivo)
    {
        $this->attributes['cultivo_id'] = Cultivo::find($cultivo)
                                        ? $cultivo
                                        : Cultivo::create(['nombre_cultivo' => $cultivo])->id;
    }

    public function setRubroIdAttribute($rubro)
    {
        $this->attributes['rubro_id'] = Rubro::find($rubro)
                                        ? $rubro
                                        : Rubro::create(['nombre_rubro' => $rubro])->id;
    }
    public function setTecnologiaIdAtrribute($tenologia)
    {
        $this->attributes['tecnologia_id']= Tecnologia::find($tenologia)
                                            ? $tenologia
                                            : Tecnologia::create(['nombre_tecnologia' =>$tenologia])->id;

    }

    public function setVariedadIdAttribute($variedad)
    {
        $this->attributes['variedad_id'] = Variedad::find($variedad)
                                        ? $variedad
                                        : Variedad::create(['nombre_variedad' => $variedad])->id;
    }

    public function syncEtapa($etapas){

        $etapaIds = collect($etapas)->map(function($etapa){

            return Etapa::find($etapa) ? $etapa : Etapa::create(['nombre_etapa' => $etapa])->id;
        });

        return $this->etapas()->sync($etapaIds);
    }

}
