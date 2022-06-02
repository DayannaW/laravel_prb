@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lineas</title>
</head>

<body>
    <div class="text-center">
        <h1>LISTADO DE LINEAS ACTIVAS</h1>
    </div>

    <div class="row justify-content-center mb-3 mx-5">

        <div class="container-md ">
            <div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mb-3" role="group" aria-label="First group">
                    <button type="button" class="btn btn-outline-secondary">Copiar</button>
                    <button type="button" class="btn btn-outline-secondary">Excel</button>
                    <button type="button" class="btn btn-outline-secondary">CSV</button>
                </div>
                
            </div>
        </div>
        <div class="container-md">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Operadora</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Planilla</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Observacion</th>
                        <th scope="col">Tarifa</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Presupuesto</th>
                        <th></th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>

   

    <script src="js/app.js"> </script>
</body>

</html>
@endsection
