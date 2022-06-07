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


    public function reasignar($id)
    {
        $lineas = Lineas::where('nombres_usuario', NULL)
                        ->where('estado',0)
                        ->get();
        //dd($lineas);
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();
        $usuarios = Usuarios::find($id);
        return view('usuario.reasignar', compact('lineas', 'cuentas', 'actividades', 'usuarios'));
    }


    public function guardarReasignar(Request $request)
    {
        $usuario = Usuarios::find($request->usuario);       //encuentro el usuario al que le voy a asignar la linea
        $act_linea = Lineas::find($request->linea)->update(['estado'=>7]);   //cambio estado a linea desabilitada           
        $datosL = Lineas::find($request->linea);
        $nuevaLinea= Lineas::create([
            'numeroLinea'=> $datosL['numeroLinea'],
            'operadora'=> $datosL['operadora'],
            'empresaInterna_id'=> $datosL['empresaInterna_id'],
            'planilla'=> $datosL['planilla'],
            'plan'=> $datosL['plan'],
            'observacion'=> $datosL['observacion'],
            'valor'=> $datosL['valor'],
            'nombres_usuario' => $usuario['nombres'],
            'apellidos_usuario' => $usuario['apellidos'],
            'cuenta' => $usuario['cuenta'],
            'actividad' => $usuario['actividad'],
            'responsable' => $usuario['responsable'],
            'presupuesto'=> $datosL['presupuesto'],
            'estado'=> 0,
        ]);
        $usuario->update(['numeroLinea' => $nuevaLinea['id']]);                     //asigno al usuario con la nueva linea creada
        return redirect()->route('usuarios.index')->with('info', 'linea asignada exitosamente');
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