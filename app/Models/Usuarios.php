<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    static $rules = [
		'cedula' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		'cuenta' => 'required',
		'actividad' => 'required',
        'responsable'=>'required',
		'numeroLinea' => 'required',

    ];

    protected $perPage = 20;

    protected $fillable = ['cedula','nombres','apellidos','cuenta','actividad','responsable','numeroLinea'];

    //relacion uno a muchos
    public function lineas(){
        return $this->hasMany('App\Models\Lineas');
    }

    //relacion uno a muchos (inversa)
    public function cuenta(){
        return $this->belongsTo('App\Models\Cuentas');
    }

    public function actividad(){
        return $this->belongsTo('App\Models\Actividades');
    }
}
