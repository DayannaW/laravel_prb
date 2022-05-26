@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIGNAR ROLES</title>
</head>

<body>
    <div class="text-center">
        <h1>ASIGNAR ROLES</h1>
    </div>
    <div class="row justify-content-center mb-3 mx-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre</h5>
                <p class="form-control">{{$usuario->name}}</p>

                <form action="{{route('admin.user.update')}}" method="match">
                @foreach ($roles as $role)
                    <div class="form-check">
                    <input type="hidden" value="{{$usuario->id}}" name="usuario" id="usuario">

                        <input class="form-check-input" type="checkbox" value="{{$role->id}}" name="roles" id="roles" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$role->name}}
                        </label>
                       
                    </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit"> Guardar </button>
                </form>

            </div>
        </div>

    </div>
    <script src="js/app.js"> </script>
</body>

</html>
@endsection