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
        $lineas = Lineas::where('estado','!=',7)->get();
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
        //actualizando estado de la linea 
        $linea   = Lineas::where('estado', '=', 0,)
                        ->where('id', '=', $request->numeroLinea)
                        ->update(['estado'=>7]);

        //desvincular la linea del usuario anterior
        $usuarioA = Usuarios::where('numeroLinea', $request->numeroLinea)->get();
                       // ->update(['numeroLinea' => NULL]);
           // dd($usuarioA);

        $usuario = Usuarios::where('cedula',$request->usuario)->get();
        
        //comprobando si existen dos lineas con el mismo usuario  
        if(count($usuario)<2){
           
            $lineaB   = Lineas::find($request->numeroLinea);
            $us_up = Usuarios::where('cedula',$request->usuario)->update(['numeroLinea' => $request['numeroLinea']]);
            $us = $usuario[0];
           // dd($us);  
            
            Lineas::create([
                'numeroLinea' => $lineaB['numeroLinea'],
                'operadora' => $lineaB['operadora'],
                'empresaInterna_id' => $lineaB['empresaInterna_id'],
                'planilla' => $lineaB['planilla'],
                'plan' => $lineaB['plan'],
                'observacion' => $lineaB['observacion'],
                'valor' => $lineaB['valor'],
                'nombres_usuario' => $us['nombres'],
                'apellidos_usuario' => $us['apellidos'],
                'cuenta' => $us['cuenta'],
                'actividad' => $us['actividad'],
                'responsable' => $us['responsable'],
                'presupuesto' => $lineaB['presupuesto'],
                'estado' => 0
            ]);
        }
        else{
            //dd($usuario);
            $usuario_u = Usuarios::where('cedula','=',$request->usuario)->take(1)->get();
            $us_ar = $usuario_u[0];
            $lineaC   = Lineas::where('estado', '=', 0,)
                        ->where('id', '=', $request->numeroLinea)
                        ->get();
        
            //dd($linea);
            Lineas::create([
                'numeroLinea' => $lineaC['numeroLinea'],
                'operadora' => $lineaC['operadora'],
                'empresaInterna_id' => $lineaC['empresaInterna_id'],
                'planilla' => $lineaC['planilla'],
                'plan' => $lineaC['plan'],
                'observacion' => $lineaC['observacion'],
                'valor' => $lineaC['valor'],
                'nombres_usuario' => $us_ar['nombres'],
                'apellidos_usuario' => $us_ar['apellidos'],
                'cuenta' => $us_ar['cuenta'],
                'actividad' => $us_ar['actividad'],
                'responsable' => $us_ar['responsable'],
                'presupuesto' => $lineaC['presupuesto'],
                'estado' => 0
            ]);

            Usuarios::create([
                'cedula' => $us_ar['cedula'],
                'nombres' => $us_ar['nombres'],
                'apellidos' => $us_ar['apellidos'],
                'cuenta' => $us_ar['cuenta'],
                'actividad' => $us_ar['actividad'],
                'numeroLinea' => $request['numeroLinea'],
                'responsable' => $us_ar['responsable']
            ]);   
        } 
        //dd($us_ar);
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
