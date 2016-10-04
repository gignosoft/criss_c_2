@extends('mantenedores.layouts.principal')

@section('titulo') {{ trans('mantproveedores.tit_actualizarProveedor') }} @endsection


@section('contenido')

    <div class="container">
        <h2>{{ trans('mantproveedores.tit_actualizarProveedor') }}</h2>
    @include('layouts.mensajes')
    <!--inicio formulario-->
        <form action="{{ url("actualizarProveedor/".$proveedor->id) }}" method="post">
            {{ csrf_field() }}

            <div class="panel-group" id="accordion">

                <!--inicio Datos personales-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosProveedor">
                                {{ trans('mantproveedores.tp_datos_personales') }}
                            </a>
                        </h4>
                    </div>
                    <div id="datosPersonales" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="identifier">{{ trans('mantproveedores.l_identifier') }}</label>
                                <input type="text" class="form-control" name="identifier" id="identifier"
                                       value="{{ $proveedor->identifier }}">
                            </div>



                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="first_name">{{ trans('mantproveedores.l_first_name') }}</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                       value="{{ $proveedor->first_name }}">
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="last_name">{{ trans('mantproveedores.l_last_name') }}</label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                       value="{{ $proveedor->last_name }}">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="email">{{ trans('mantproveedores.l_email') }}</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       value="{{ $proveedor->email }}">
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="country_id">{{ trans('mantproveedores.isd_city') }}</label>
                                <select class="form-control" name="country_id" id="country_id"
                                        onchange="cargaComboCiudad('../cargaCiudadUsuario/'+this.value)" >
                                    <option  value="">{{ trans('mantproveedores.l_country') }}</option>
                                    @foreach( $paises as $pais )
                                        @if( $pais->id == $id_pais)
                                            <option selected value="{{ $pais->id }}">{{ $pais->name }}</option>
                                        @else
                                            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <div id="comboCiudad">
                                    <label for="city_id">{{ trans('mantproveedores.l_city') }}</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">{{ trans('mantproveedores.isd_city') }}</option>
                                        @foreach($ciudades_del_pais as $ciudad)
                                            @if( $ciudad->id == $id_ciudad)
                                                <option selected value='{{ $ciudad->id }}'>{{ $ciudad->name }}</option>
                                            @else
                                                <option value='{{ $ciudad->id }}'>{{ $ciudad->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!--fin Datos personales-->

                <!--inicio Roles-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                {{ trans('mantproveedores.tp_roles') }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            @foreach($roles as $rol)

                                <label class="checkbox col-xs-6 ">
                                    @if( isset( $proveedor->roles->find($rol->id)->id ) )
                                        <input type="checkbox" name="roles[]" id="{{ $rol->id }}"
                                               value="{{ $rol->id }}" checked >{{ $rol->name }}
                                    @else
                                        <input type="checkbox" name="roles[]" id="{{ $rol->id }}"
                                               value="{{ $rol->id }}">{{ $rol->name }}
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--fin Roles-->

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                {{ trans('mantproveedores.tp_cargos') }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">

                        <div class="panel-body">
                            @foreach($positions as $position)
                                <label class="checkbox col-xs-6 ">
                                    @if( isset( $proveedor->positions->find($position->id)->id ) )
                                        <input checked type="checkbox" name="positions[]"
                                               value="{{ $position->id }}">{{ $position->name }}
                                    @else
                                        <input type="checkbox" name="positions[]"
                                               value="{{ $position->id }}">{{ $position->name }}
                                    @endif
                                </label>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>

            <!--botones-->
            <div class="row col-sm-12 padding col-xs-12  margenes-botones">
                <input type="button" class="btn btn-warning "
                       onclick='window.location ="{{ url("restablecerContrasenia/".$proveedor->id) }}"'
                       value="{{ trans('mantproveedores.btn_pass_reset') }}">
                &nbsp;
                <input type="submit" class="btn btn-primary "
                       value="{{ trans('mantproveedores.btn_guardar') }}">
                &nbsp;
                <input type="button" class="btn btn-primary "
                       onclick='window.location ="{{ route("listarUsuario") }}"'
                       value="{{ trans('mantproveedores.btn_volver') }}">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>


@endsection