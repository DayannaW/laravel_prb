@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios del sistema</title>
</head>

<body>
    <div class="text-center">
        <h1>USUARIOS DEL SISTEMA</h1>
    </div>
    <div class="row justify-content-center mb-3 mx-5">

        <div class="container-md ">
            <div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mb-3" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary">Copiar</button>
                    <button type="button" class="btn btn-outline-secondary">Excel</button>
                    <button type="button" class="btn btn-outline-secondary">CSV</button>
                </div>
                <div class="btn-group mb-3">
                    <a type="button" class="btn btn-primary" aria-label="Input group example" href="{{url('/lineas/create')}}">Crear</a>
                </div>
            </div>
        </div>
        <div class="container-md">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Correo de verificacion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $us)
                    <tr>
                        <td>{{$us->name }}</td>
                        <td>{{$us->email }}</td>
                        <td>{{$us->email_verified_at }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.user.edit',$us->id)}}">Editar</a>
                        </td>
                    </tr>
        </div>


        @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <script src="js/app.js"> </script>
</body>

</html>
@endsection