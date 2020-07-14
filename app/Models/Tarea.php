<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'prioridad_id', 'tags'];

    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }


    public function prioridad(){
        return $this->belongsTo(Prioridad::class);
    }
}
