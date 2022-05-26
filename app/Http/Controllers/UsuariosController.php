<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Cuentas;
use App\Models\Lineas;
use App\Models\Actividades;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios = Usuarios::all();
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();
        $lineas = Lineas::all();
        return view('usuario.index',compact('lineas', 'usuarios','cuentas','actividades')); 
    }

    public function create()
    {
        //$ultimoregistro = Lineas::latest('id')->first();
        $usuarios = new Usuarios();
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();
        return view('usuario.crear', compact('usuarios', 'cuentas', 'actividades'));
    }


    public function store(Request $request)
    {
        //dd($request);
        $usuario = Usuarios::create($request->all());

        return redirect()->route('usuarios.index');
    }

    public function show()
    {
        //
    }


    public function edit($id)
    {
       //
    }


    public function update()
    {
        //
    }


    public function destroy()
    {
        //
    }
}



/* al guardar un usuario se actualiza los siguientes campos en la tabla lineas

 $findNum = Lineas::find($request->numeroLinea);
        $findNum->update([
            'nombres_usuario'   => $request['nombres'],
            'apellidos_usuario' => $request['apellidos'],
            'cuenta'            => $request['cuenta'],
            'actividad'         => $request['actividad'],
            'responsable'       => $request['responsable'],
        ]);

*/