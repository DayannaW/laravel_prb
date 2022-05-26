@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REASIGNAR LINEA</title>
</head>

<body>
    <div class="text-center">
        <h1>REASIGNAR LINEA</h1>
    </div>
    <div class="row justify-content-center mx-5">

        <form action="{{url('usuarios.update')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" class="form-control" value="{{$usuario->cedula}}" name="cedula" id="cedula">

            <input type="hidden" class="form-control" value="{{$usuario->nombres}}" name="nombres" id="nombres">

            <input type="hidden" class="form-control" value="{{$usuario->apellidos}}" name="apellidos" id="apellidos">

            <div class="form-group col-md-7 mb-3">
                <label for="usuarioA" class="form-label">Usuario </label>
                <input type="text" class="form-control" value="{{$usuario->nombres}} {{$usuario->apellidos}}" name="usuarioA" id="usuarioA">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="cedula" class="form-label">Cuenta</label>
                <input type="text" class="form-control" value="{{$usuario->cuenta}}" name="cuenta" id="cuenta">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="cedula" class="form-label">Actividad</label>
                <input type="text" class="form-control" value="{{$usuario->actividad}}" name="actividad" id="actividad">
            </div>


            <input type="submit" value="Modificar Usuario">

        </form>
    </div>


</body>

</html>
@endsection