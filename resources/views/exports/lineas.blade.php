<table >
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
                <tbody>
                    @foreach ($lineas as $linea)

                    <tr>
                        <td>{{$linea->numeroLinea}}</td>
                        <td>{{$linea->operadora}}</td>
                        <td>@foreach ($empresa as $empresas)
                            @if ($empresas->id==$linea->empresaInterna_id)
                            {{$empresas->nombreEmpresa}}
                            @endif
                            @endforeach
                        </td>
                        <td>{{$linea->planilla}}</td>
                        <td>{{$linea->plan}}</td>
                        <td>{{$linea->observacion}} </td>
                        <td>{{$linea->valor}}</td>
                        <td>{{$linea->nombres_usuario}} {{$linea->apellidos_usuario}}</td>
                        <td>@foreach ($cuentas as $cuenta)
                            @if ($cuenta->id==$linea->cuenta)
                            {{$cuenta->nombreCuenta}}
                            @endif
                            @endforeach</td>
                        <td>@foreach ($actividades as $actividad)
                            @if ($actividad->id==$linea->actividad)
                            {{$actividad->nombreCargo}}
                            @endif
                            @endforeach</td>
                        <td>{{$linea->responsable}}</td>
                        <td>{{$linea->presupuesto}} </td>
                       
                    </tr>
                    @endforeach

                  
                </tbody>
            </table>