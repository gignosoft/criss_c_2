<?php
/**
 * Created by PhpStorm.
 * User: Cristhian Paredes
 * Date: 02/10/2016
 * Time: 11:03
 */

@extends('mantenedores_dev.layouts.main')



@section('buscador')

    <form action={{ url("buscarActivo") }} method="post">

        {{ csrf_field() }}

        <label for="activo">Activo</label>
        <input type="text" name="ativo" id="activo">

        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion"> <br/><br/>

        <label for="code">Codigo</label>
        <input type="text" name="code" id="code">

        <label for="proveedor">Rut</label>
        <input type="text" name="proveedor" id="proveedor"> <br/><br/>

        <label for="usuario">Rut</label>
        <input type="text" name="usuario" id="usuario"> <br/><br/>

        <input type="submit"  value="Buscar">
        <input type="button"  value="Nuevo activo">
        <input type="button" value="Salir">

        // no existe ningun criterio de busqueda relacionada
    </form>

@endsection


@section('filas')


    <tr>
        <td>Activo</td>
        <td>Descripcion</td>
        <td>Code</td>
        <td>Proveedor</td>
        <td>codigo compra</td>
        <td>estado</td>
        <td>acción</td>
    </tr>
    @if($numActivos == 0)
        <tr>
            <td>{{'No existen activos con el criterio de búsqueda'}}</td>
        </tr>
    @endif

    @if($numActivos > 0)
        @foreach($activos as $activo)
            <tr>
                <td>{{$activo->name}}</td>
                <td>{{$activo->description}}</td>
                <td>{{$activo->code}}</td>
                <td>{{$activo->supplier_id}}</td>
                <td>{{'codigo compra'}}</td>
                <td>{{$activo->state_assets()->first()->name}}</td>
            </tr>
        @endforeach
    @endif





@endsection