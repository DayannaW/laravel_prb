<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function usuarios(){
         return $this->hasMany('App\Models\Usuarios');
    }

    //relacion uno a muchos (inversa)

       public function empresa(){
    return $this->belongsTo('App\Models\Empresa');
    }

}
