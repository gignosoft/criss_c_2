@extends('mantenedores.layouts.principal')

@section('titulo') Mantenedor de activos @endsection


@section('contenido')

    <div class="container">
        <h1>Mantenedor de Activos</h1>

        @include('layouts.mensajes')

        <form action={{ url("listarActivo") }} method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="activo">Activo</label>
                    <input type="text" class="form-control" name="activo" id="activo" placeholder="Ingrese Activo">
                </div>
             </div>
            <div class="container">
                <p class="row" >
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <button type="button" onclick='window.location ="{{ url("ingresarActivo") }}"' class="btn btn-primary">Nuevo</button>
                    <button type="button" onclick='window.location ="{{ url("mantenedores") }}"'  class="btn btn-primary">Salir</button>
                </p>
            </div>
        </form>


        <div class="row" >

            <div class="col-xs-12" >
                <table class="table ">
                    <thead>
                    <tr class="row">
                        <th class="col-xs-5">Nombre         </th>
                        <th class="col-xs-2">Descripcion    </th>
                        <th class="col-xs-3">Proveedor      </th>
                        <th class="col-xs-2">Codigo         </th>
                        <th class="col-xs-2">Usuario        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @if($numActivos == 0)
                        <tr>
                            <td>{{'No existen activos con el criterio de búsqueda'}}</td>
                        </tr>
                    @endif

                    @if($numActivos > 0)
                        @foreach($activos as $activo)
                            <tr class="row">
                                <td class="col-xs-5">{{ $activo->name }}</td>
                                <td class="col-xs-2 centered">{{ $activo->levelPositions->level }}</td>
                                <td class="col-xs-3 centered">{{ $activo->departments->name }}</td>

                                <td class=" col-xs-2">
                                    <a class="iconos" href="{{ url('actualizarActivo/'.$activo->id) }}"   data-toggle="tooltip" title="Editar" >  <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/></a> |
                                    <a class="iconos" href="{{ url('verActivo/'.$activo->id) }}"          data-toggle="tooltip" title="Ver más" > <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/></a> |

                                    <!-- inicio eliminar -->
                                    @if ( count( $activo->users ) > 0 )
                                        <a class="iconos"
                                           href="javascript:alert('El activo posee usuarios asociados, no se puede eliminar')"
                                           data-toggle="tooltip" title="Eliminar">
                                            <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                        </a>
                                    @else
                                        <a class="iconos"
                                           href="javascript:confirmarEliminar(
                                            '{{ url('eliminarActivo/'.$activo->id) }}',
                                            '{{ $activo->name }}',
                                            '{{ 'mensaje eliminar'}}'
                                           )"
                                           data-toggle="tooltip" title="Eliminar">
                                            <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                        </a>
                                    @endif
                                    <!-- fin eliminar -->

                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>


                </table>

            </div>

        </div>

        {!! $activos->render() !!}

    </div>


@endsection