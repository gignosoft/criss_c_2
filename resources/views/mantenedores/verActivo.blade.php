@extends('mantenedores.layouts.principal')

@section('titulo')
    {{ 'Ver activo' }}
@endsection

@section('contenido')


    <div class="row">

        <div class="col-xs-2"></div>
        <div class="panel-group col-xs-8" id="accordion">

            <!--inicio -->
            <div class="panel panel-info">

                <!--Titulo-->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#">
                            {{ 'Detalle del nivel' }}
                        </a>
                    </h4>
                </div>
                <!--Fin Titulo-->

                <div class="panel-body row">

                    <!--Elemento_1-->
                    <p class="row">
                        <div class="col-xs-3">Nombre</div>
                        <div class="col-xs-9">: {{ $activo->name }}</div>
                    </p>

                    <!--Elemento_2-->
                    <p class="row">
                    <div class="col-xs-3">Descripcion</div>
                    <div class="col-xs-9">: {{ $activo->description }}</div>
                    </p>


                    <!--Elemento_3-->
                    <p class="row">
                    <div class="col-xs-3">Codigo</div>
                    <div class="col-xs-9">: {{ $activo->code }}</div>
                    </p>


                    <!--Elemento_4-->
                    <p class="row">
                    <div class="col-xs-3">Descripcion</div>
                    <div class="col-xs-9">: {{ $activo->name }}</div>
                    </p>



                    <!--Elemento_5-->
                    <p class="row">
                    <div class="col-xs-3">Proveedor</div>
                    <div class="col-xs-9">:
                        @if( count($proveedor->supplier) > 0 )
                            {{ $proveedor->suppliers->name }}
                        @else
                            {{ 'No posee proveedor asociado.' }}
                        @endif

                    </div>
                    </p>


                    <!--Elemento_4-->
                    <p class="row">
                    <div class="col-xs-3">Activos asociados</div>

                    @if( $numUsuarios > 0 )
                    <div class="col-xs-9">: {{ $numActivos }}
                        <ul>
                            @foreach( $activos as $activo)
                                <li>{{ $acivo->first_name." ".$activo->last_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                        <div class="col-xs-9">: {{ 'sin activos asociados' }} </div>
                    @endif


                    </p>


                    <!--Botones-->
                    <p class="row">
                        <div class="col-xs-10"></div>
                        <div class="col-xs-2">
                            <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarActivo") }}"' value="Volver">
                        </div>
                    </p>


                </div>

            </div>

        </div>
        <div class="col-xs-2"></div>



    </div>




@endsection