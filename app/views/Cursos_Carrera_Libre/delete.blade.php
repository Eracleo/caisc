@extends('layouts.base_admin')
@section('title')
Eliminar <small>CURSO LIBRE </small>
@stop
@section('options')
<li>{{ HTML::link('CursosLibres/index.html','Listar') }}</li>
<li>{{ HTML::link('CursosLibres/create.html','Nuevo') }}</li>
<li><a href="#">Eliminar Curso</a></li>
@stop
@section('content')
    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th>Codigo Curso</th>
                <th>Nombre del Curso</th>
                <th>Horas Academicas</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $dato)
        <tr class="odd">
                <td class=" "><b>{{ $dato->id }}</b></td>
                <td class=" ">{{ $dato->nombre }}</td>
                <td class=" ">{{ $dato->horas_academicas }}</td>
                <td class=" ">
                <a href="post_delete/{{ $dato->id }}"><span class="label label-danger">Eliminar</a>
          </td>
        </tr>
        @endforeach
        </tbody>
    </table>
         Pagina Actual:{{ $datos->getCurrentPage()}}
        {{ $datos->links()}}
@stop
