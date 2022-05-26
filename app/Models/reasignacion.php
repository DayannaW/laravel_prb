<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reasignacion extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function linea(){
        return $this->belongsTo('App\Models\Lineas');
    }
}
