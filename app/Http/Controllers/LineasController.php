<?php

namespace App\Http\Controllers;

use App\Models\Lineas;
use App\Models\Empresa;
use App\Models\Usuarios;
use App\Models\Cuentas;
use App\Models\Actividades;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class LineasController extends Controller
{

    public function index()
    {
        $lineas = Lineas::all();
        $usuarios = Usuarios::all();
        $empresa = Empresa::all();
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();

        return view('Linea.index', compact('lineas', 'usuarios', 'empresa', 'cuentas', 'actividades'));
    }


    public function create()
    {
        $lineas = new Lineas();
        $empresas = Empresa::all();
        return view('Linea.crear', compact('lineas', 'empresas'));
    }


    public function store(Request $request)
    {
        $lineas = Lineas::all();
        $empresa = Empresa::all();
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();
        $cantidad = $request->numeros;
        //dd($cantidad);
        for ($i = 0; $i < count($cantidad); $i++) {
            $registrar =  Lineas::create([
                'numeroLinea' => $request->numeros[$i],
                'operadora' => $request->operadora,
                'empresaInterna_id' => $request['empresaInterna_id'],
                'planilla' => $request['planilla'],
                'plan' => $request['plan'],
                'observacion' => $request['observacion'],
                'valor' => $request['valor'],
                'nombres_usuario' => $request['nombres_usuario'],
                'apellidos_usuario' => $request['apellidos_usuario'],
                'presupuesto' => $request['presupuesto'],
                'estado' => 0
            ]);
        }

        return redirect()->route('lineas.index');
    }


    public function edit($id)
    {
        $linea = Lineas::find($id);
        $empresas = Empresa::all();
        return view('Linea.editar', compact('linea', 'empresas'));
    }


    public function update(Request $request)
    {
        $linea = Lineas::find($request->id);
        $linea->update($request->all());
        $usuario = Usuarios::where('numeroLinea', '=', $request->id_linea)->update([
            'nombres' => $request['nombres_usuario'],
            'apellidos' => $request['apellidos_usuario'],
            'numeroLinea' => $request['id_linea'],
            'responsable' => $request['responsable'],
        ]);
        return redirect()->route('lineas.index');
    }


    public function reasignar($id)
    {
        $linea = Lineas::find($id);
        $cuentas = Cuentas::all();
        $actividades = Actividades::all();
        $usuarios = Usuarios::all();
        return view('Linea.reasignar', compact('linea', 'cuentas', 'actividades', 'usuarios'));
    }


    public function guardarReasignar(Request $request)
    {
        $linea   = Lineas::where('estado', '=', 0,)
                        ->where('id', '=', $request->numeroLinea)
                        ->update(['estado'=>7]);

        $usuarioA = Usuarios::where('numeroLinea', '=', $request->numeroLinea)
                        ->update(['numeroLinea' => NULL]);

        $usuario = Usuarios::where('cedula','=',$request->usuario)->get();
        //dd($linea);
          
        if(count($usuario)<2){
            $lineaB   = Lineas::where('estado', '=', 0,)
                        ->where('id', '=', $request->numeroLinea)
                        ->get();
            $usuario->update(['numeroLinea' => $request['numeroLinea']]);
            Lineas::create([
                'numeroLinea' => $lineaB['numeroLinea'],
                'operadora' => $lineaB['operadora'],
                'planilla' => $lineaB['planilla'],
                'plan' => $lineaB['plan'],
                'valor' => $lineaB['valor'],
                'nombres_usuario' => $usuario['nombres'],
                'apellidos_usuario' => $usuario['apellidos'],
                'cuenta' => $usuario['cuenta'],
                'actividad' => $usuario['actividad'],
                'responsable' => $usuario['responsable'],
                'presupuesto' => $lineaB['presupuesto'],
                'estado' => 0
            ]);
        }
        else{
            //dd($usuario);
            $usuarioU = Usuarios::where('cedula','=',$request->usuario)->take(1)->get();
            $lineaC   = Lineas::where('estado', '=', 0,)
                        ->where('id', '=', $request->numeroLinea)
                        ->get();
        
            //dd($linea);
            Lineas::create([
                'numeroLinea' => $lineaC['numeroLinea'],
                'operadora' => $lineaC['operadora'],
                'planilla' => $lineaC['planilla'],
                'plan' => $lineaC['plan'],
                'valor' => $lineaC['valor'],
                'nombres_usuario' => $usuario['nombres'],
                'apellidos_usuario' => $usuario['apellidos'],
                'cuenta' => $usuario['cuenta'],
                'actividad' => $usuario['actividad'],
                'responsable' => $usuario['responsable'],
                'presupuesto' => $lineaC['presupuesto'],
                'estado' => 0
            ]);

            Usuarios::create([
                'cedula' => $usuario['cedula'],
                'nombres' => $usuario['nombres'],
                'apellidos' => $usuario['apellidos'],
                'cuenta' => $usuario['cuenta'],
                'actividad' => $usuario['actividad'],
                'numeroLinea' => $request['numeroLinea'],
                'responsable' => $usuario['responsable']
            ]);   
        } 
        //dd($usuario);
        return redirect()->route('lineas.index')->with('info', 'linea asignada exitosamente');
    }


    public function show()
    {
        echo 'helloo';
    }


    public function destroy(Linea $linea)
    {
        //
    }
}



/*



*/
