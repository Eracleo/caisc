@extends('layouts.base_admin')
@section('title')
Listar Carreras Profesionales
@stop
@section('options')
<li>CARRERAS PROFESIONALES</li>
@stop
<style>
    span {
        margin: 5px;
    }
    span a{
        color: white;
    }
</style>
@section('content')
        <div class="col-xs-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Buscar: <input aria-controls="example1" type="text"></label>
                        <a href="CarreraProfesional/add.html"><span class="label label-success">AGREGAR CARRERA</a>
                    </div>
        </div>
    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th>Cod Carrera Profesional</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $dato)
        <tr class="odd">
                <td class="  sorting_1">{{ HTML::link('docente/profile/'.$dato->id,$dato->id) }}</td>
                <td class=" ">{{ $dato->nombre }}</td>
                <td class=" ">{{ $dato->descripcion }}</td>
                <td class=" ">
                    <span class="label label-warning">{{ HTML::link('CarreraProfesional/updatecID/'.$dato->id,'Actualizar') }}</span>
                    <span class="label label-danger">{{ HTML::link('CarreraProfesional/post_eliminar/'.$dato->id,'Eliminar') }}</span>
                    <span class="label label-primary">{{ HTML::link('CarreraProfesional/profile/'.$dato->id,'Detalles') }}</span>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
        <div class="col-sm-6">{{ $datos->links()}}</div>
@stop
