<?php

namespace App\Exports;

use App\Models\Lineas;
use App\Models\Empresa;
use App\Models\Usuarios;
use App\Models\Cuentas;
use App\Models\Actividades;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class LineasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $lineas = Lineas::where('estado', '!=', 7)->get();
        $empresa = Empresa::select('id','nombreEmpresa')->get();
        $cuentas = Cuentas::select('id','nombreCuenta')->get();
        $actividades = Actividades::select('id','nombreCargo')->get();

        return view('exports.lineas', compact('lineas', 'empresa', 'cuentas', 'actividades'));
    }
}
