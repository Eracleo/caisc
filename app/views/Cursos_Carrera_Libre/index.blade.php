@extends('layouts.base_admin')
@section('title')
Lista <small>CURSOS LIBRES </small>
@stop
@section('options')
<li>{{ HTML::link('CursosLibres/index.html','Listar') }}</li>
<li>{{ HTML::link('CursosLibres/create.html','Nuevo') }}</li>
@stop
@section('content')
    <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
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
                <td class="" >
                    <span class="label label-success">{{ HTML::link('CursosLibres/updatecID/'.$dato->id,'Actualizar') }}</span>
                    <span class="label label-danger">{{ HTML::link('CursosLibres/post_delete/'.$dato->id,'Eliminar') }}</span>
                   <!-- <a href="post_delete/{{ $dato->id }}"><span class="label label-danger">Eliminar</a>
                -->
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
     Pagina Actual:{{ $datos->getCurrentPage()}}
    {{ $datos->links()}}
@stop
