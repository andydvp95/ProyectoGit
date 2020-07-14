<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    public function tareas(){
        //Muchas tareas - uno a varios
        return $this->hasMany(Tarea::class);
    }
}
