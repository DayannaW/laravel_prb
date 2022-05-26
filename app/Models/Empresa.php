<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function lineas(){
        return $this->hasMany('App\Models\Lineas');
    }

    public function cuentas(){
        return $this->hasMany('App\Models\Cuentas');
    }

}
