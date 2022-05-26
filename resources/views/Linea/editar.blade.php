@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nueva linea</title>
</head>

<body>

    <div class="text-center">
        <h1>MODIFICAR LINEA</h1>
    </div>

    <div class="row justify-content-center mb-3 mx-5">

        <form method="post" action="{{ route('lineas.update', $linea->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id_linea" value="{{$linea->id}}">
            <div class="form-group col-md-7 mb-3">
                <label for="numeroLinea" class="form-label">Número de linea</label>
                <input type="text" class="form-control" value="{{$linea->numeroLinea}}" name="numeroLinea" id="numeroLinea">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="operadora" class="form-label">Operadora</label>
                <input type="text" class="form-control" value="{{$linea->operadora}}" name="operadora" id="operadora">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="empresaInterna_id" class="form-label">Empresa</label>
                <input type="text" class="form-control" value="{{$linea->empresaInterna_id}}" name="empresaInterna_id" id="empresaInterna_id">
            </div>


            <div class="form-group col-md-7 mb-3">
                <label for="cuenta" class="form-label">Planilla</label>
                <input type="text" class="form-control" value="{{$linea->planilla}}" name="planilla" id="planilla">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="plan" class="form-label">Plan</label>
                <input type="text" class="form-control" value="{{$linea->plan}}" name="plan" id="plan">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="valor" class="form-label">Tarifa</label>
                <input type="text" class="form-control" value="{{$linea->valor}}" name="valor" id="valor">
            </div>
            <div class="form-group col-md-7 mb-3">
                <label for="nombres_usuario" class="form-label">Nombres usuario</label>
                <input type="text" class="form-control" value="{{$linea->nombres_usuario}}" name="nombres_usuario" id="nombres_usuario">
            </div>
            <div class="form-group col-md-7 mb-3">
                <label for="apellidos_usuario" class="form-label">Apellidos usuario</label>
                <input type="text" class="form-control" value="{{$linea->apellidos_usuario}}" name="apellidos_usuario" id="apellidos_usuario">
            </div>
            <div class="form-group col-md-7 mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <input type="text" class="form-control" value="{{$linea->responsable}}" name="responsable" id="responsable">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="presupuesto" class="form-label">Presupuesto</label>
                <input type="text" class="form-control" value="{{$linea->presupuesto}}" name="presupuesto" id="presupuesto">
            </div>

            <input type="submit" value="Guardar linea">
        </form>
    </div>
</body>

</html>
@endsection