@extends('mantenedores.layouts.principal');


@section('titulo')
    {{ 'Ingresar activos' }}
@endsection


@section('contenido')

    <div class="container">
        <h2>Ingresar Activo</h2>
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

                <!--inicio Datos personales-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosPersonales">Datos de activo</a>
                        </h4>
                    </div>
                    <div id="datosActivos" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="name">Activo</label>
                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="Ingrese el Activo">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" name="descripcion" id="descripcion"> <br/><br/>
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="code">Codigo</label>
                            <input type="text" name="code" id="code">
                            </div>

                                <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            label for="usuario">Rut</label>
                            <input type="text" name="usuario" id="usuario"> <br/><br/>
                                </div>


                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="supplier_id">Proveedor</label>
                                <select class="form-control" name="supplier_id" id="supplier_id"  >
                                    <option value="" >Seleccione un proveedor</option>
                                    @foreach( $proveedores as $proveedor )
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
                <!--fin Datos activos-->

            </div>

            <!--botones-->
            <div class="row col-sm-12 padding col-xs-12  margenes-botones">
                <input type="submit" class="btn btn-primary " value="Guardar">                &nbsp;
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarActivos") }}"' value="Volver">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>



@endsection