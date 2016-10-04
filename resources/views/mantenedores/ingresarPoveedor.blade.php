@extends('mantenedores.layouts.principal');


@section('titulo')
    {{ 'Ingresar proveedor' }}
@endsection


@section('contenido')

    <div class="container">
        <h2>Ingresar Proveedor</h2>
        @if( count($errors) > 0 )
            @foreach( $errors->all() as $error )
                <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endforeach
        @endif
    </div><!-- fin mensajes de error -->


    <div class="container">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- fin mensajes de flash -->


    <div class="container">

        <!--inicio formulario-->
        <form action="" method="post">
            {{ csrf_field() }}

            <div class="panel-group" id="accordion">

                <!--inicio Datos Proveedor-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosProveedor">Datos de Proveedor</a>
                        </h4>
                    </div>
                    <div id="datosProveedor" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="name">Proveedor</label>
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Ingrese el Proveedor">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="levelPositions_id">Nivel</label>
                                <select class="form-control" name="levelPositions_id" id="levelPositions_id"  >
                                    <option value="" >Seleccione un nivel</option>
                                    @foreach( $niveles as $nivel )
                                        <option value="{{ $nivel->id }}">{{ $nivel->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="supplier_id">Proveedor</label>
                                <select class="form-control" name="supplier_id" id="supplier_id"  >
                                    <option value="" >Seleccione un proveedor</option>
                                    @foreach( $proveedors as $proveedor )
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
                <!--fin Datos Proveedor-->

            </div>

            <!--botones-->
            <div class="row col-sm-12 padding col-xs-12  margenes-botones">
                <input type="submit" class="btn btn-primary " value="Guardar">                &nbsp;
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarProveedor") }}"' value="Volver">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>



@endsection