@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo Usuario</title>
</head>

<body>
    <div class="text-center">
        <h1>CREAR NUEVO USUARIO</h1>
    </div>
    <div class="row justify-content-center mx-5">

        <form action="{{url('/usuarios/store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group col-md-7 mb-3">
                <label for="cedula" class="form-label">Numero de cedula</label>
                <input type="text"  maxlength="10" minlength="10" class="form-control" name="cedula" id="cedula">
            </div>


            <div class="form-group col-md-7 mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="cuenta" class="form-label">Cuenta</label>
                <select class="form-select" aria-label="Default select example" name="cuenta" id="cuenta">
                    <option selected>seleccione</option>
                    @foreach ($cuentas as $cuenta)
                    <option value="{{$cuenta->id}}">{{$cuenta->nombreCuenta}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="actividad" class="form-label">Actividad</label>
                <select class="form-select" aria-label="Default select example" name="actividad">
                    <option selected>seleccione</option>
                    @foreach ($actividades as $actividad)
                    <option value="{{$actividad->id}}">{{$actividad->nombreCargo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <input type="text" class="form-control" name="responsable" id="responsable">
            </div>

            <input type="submit" value="Crear Usuario">

        </form>
    </div>


</body>

</html>
@endsection