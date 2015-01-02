@extends('layouts.base_admin')
@section('title')
Lista <small> Carreras Profesionales </small>
@stop
@section('options')
<li>{{HTML::link('CarreraProfesional','Listar')}}</li>
<li>{{HTML::link('CarreraProfesional/add.html','Nueva Carrera')}}</li>
@stop
@section('content')
<div class="box">
    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th>Codigo Carrera Profesional</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $dato)
        <tr class="odd">
                <td class="  sorting_1">{{ $dato->id }}</td>
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
    Pagina Actual:{{ $datos->getCurrentPage()}}
    {{ $datos->links()}}
</div>
@stop
