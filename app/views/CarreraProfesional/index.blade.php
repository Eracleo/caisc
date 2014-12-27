@extends('layouts.base_admin')
@section('title')
Listar Carreras Profesionales
@stop
@section('options')
<li>CARRERAS PROFESIONALES</li>
@stop
@section('content')
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
                    {{ HTML::link('CarreraProfesional/updatecID/'.$dato->id,'Actualizar') }}
                    {{ HTML::link('CarreraProfesional/post_eliminar/'.$dato->id,'Eliminar') }}
                    {{ HTML::link('CarreraProfesional/profile/'.$dato->id,'Detalles') }}
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
         Pagina Actual:{{ $datos->getCurrentPage()}}
        {{ $datos->links()}}
@stop
