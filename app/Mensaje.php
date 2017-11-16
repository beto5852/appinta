<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $table = 'mensajes';
    protected  $guarded = ['id'];
    
   // protected $fillable =['envia_id','recibe_id','body'];

    public function sender()
    {
        return $this->belongsTo(User::class,'envia_id');
    }
}
