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

    <style>
        .puntero {
            cursor: pointer;
        }

        .ocultar {
            display: none;
        }
    </style>

    <div class="text-center">
        <h1>CREAR UNA NUEVA LINEA</h1>
    </div>

    <div class="row justify-content-center mb-3 mx-5">

        <form action="{{url('lineas/store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />


            <div class="form-group col-md-7 mb-3">
                <label for="operadora" class="form-label">Operadora</label>
                <input type="text" class="form-control" name="operadora" id="operadora">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="empresaInterna_id" class="form-label">Empresa</label>
                <select class="form-select" aria-label="Default select example" name="empresaInterna_id">
                    <option selected>Seleccionar</option>
                    @foreach ($empresas as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->nombreEmpresa}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="planilla" class="form-label">Planilla</label>
                <input type="text" class="form-control" name="planilla" id="planilla">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="plan" class="form-label">Plan</label>
                <input type="text" class="form-control" name="plan" id="plan">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="observacion" class="form-label">Observacion</label>
                <input type="text" class="form-control" name="observacion" id="observacion">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="valor" class="form-label">Tarifa</label>
                <input type="text" class="form-control" name="valor" id="valor">
            </div>

            <div class="form-group col-md-7 mb-3">
                <label for="presupuesto" class="form-label">Presupuesto</label>
                <input type="text" class="form-control" name="presupuesto" id="presupuesto">
            </div>


            <div class="form-row clonar">
                <div class="form-group col-md-7 mb-3">
                    <label for="numeroLinea" class="form-label">Número de linea</label>
                    <input type="text" maxlength="10" minlength="10" class="form-control" name="numeros[]" id="numeros">
                    <span class="badge badge-pill badge-danger puntero ocultar">Eliminar</span>
                </div>
            </div>

            <div class="form-group col-md-12 mb-3">
                <button class="btn btn-primary " id="agregar">Agregar +</button>
            </div>


            <div id="contenedor"> </div>

            <input type="submit" value="Guardar linea">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script>
        let agregar = document.getElementById('agregar');
        let contenido = document.getElementById('contenedor');

        agregar.addEventListener('click', e => {
            e.preventDefault();
            let clonado = document.querySelector('.clonar');
            let clon = clonado.cloneNode(true);

            contenido.appendChild(clon).classList.remove('clonar');
            let remover_ocultar = contenido.lastChild.childNodes[1].querySelectorAll('span');
            remover_ocultar[0].classList.remove('ocultar');
        });

        contenido.addEventListener('click', e => {
            e.preventDefault();
            if (e.target.classList.contains('puntero')) {
                let contenedor = e.target.parentNode.parentNode;

                contenedor.parentNode.removeChild(contenedor);
            }
        });
    </script>

</body>

</html>
@endsection