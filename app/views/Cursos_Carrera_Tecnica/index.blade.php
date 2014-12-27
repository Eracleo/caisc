@extends('layouts.base_admin')
@section('title')
Lista <small>CURSOS DE CARRERA  </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
@stop
@section('content')
  <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">

                <th>Codigo Curso</th>
                <th>Nombre del Curso</th>
                <th>Modulo</th>
                <th>Horas Acad.</th>
                <th>Carrera</th>
                <th>Actions</th>
            </tr>
        </thead>
    <tbody aria-relevant="all" aria-live="polite" role="alert">
        @foreach( $datos as $dato)
        <tr class="odd">
                <td class=" "><b>{{ $dato->id }}</b></td>
                <td class=" ">{{ $dato->nombre }}</td>
                <td class=" ">{{ Modulo::find($dato->modulo)->nombre }}</td>
                <td class=" ">{{ $dato->horas_academicas }}</td>
                <td class=" ">{{ Carrera::find($dato->codCarrera)->nombre }}</td>
                <td class=" ">
                    <span class="label label-warning">{{ HTML::link('CursosTecnica/updatecID/'.$dato->id,'Actualizar') }}</span>
                    <span class="label label-danger">{{ HTML::link('CursosTecnica/post_delete/'.$dato->id,'Eliminar') }}</span>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
     Pagina Actual:{{ $datos->getCurrentPage()}}
    {{ $datos->links()}}
@stop
