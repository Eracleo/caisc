@extends('layouts.base_admin')
@section('title')
Lista de Docentes
@stop
@section('options')

@stop
@section('content')
        <table class="table table-bordered table-striped dataTable">
            <thead>
                <tr role="row">
                    <th style="width: 90px;">Cod Docente</th>
                    <th style="width: 283px;">Apellidos y Nombres</th>
                    <th style="width: 244px;">E-mail</th>
                    <th style="width: 163px;">Teléfono</th>
                    <th style="width: 114px;">Actions</th>
                </tr>
            </thead>
            <tbody aria-relevant="all" aria-live="polite" role="alert">
            @forelse( $datos as $dato)
            <tr class="odd ">
                @if($dato->estado)
                <td>{{ HTML::link('docente/profile/'.$dato->id,$dato->id) }}</td>
                @else
                <td class="alert-danger">{{ HTML::link('docente/profile/'.$dato->id,$dato->id) }}</td>
                @endif
                <td><b>{{ $dato->apellidos }}</b> {{ $dato->nombre }}</td>
                <td>{{ $dato->email }}</td>
                <td>{{ $dato->telefono }}</td>
                <td>
                    <span class="label label-warning">{{ HTML::link('docente/edit/'.$dato->id,'Actualizar') }}</span>
                    @if($dato->estado)
                    <span class="label label-danger">{{ HTML::link('docente/delete/'.$dato->id,'Deshabilitar') }}</span>
                    @else
                    <span class="label label-primary">{{ HTML::link('docente/active/'.$dato->id,'Habilitar') }}</span>
                    @endif
                    <span class="label label-primary">{{ HTML::link('docente/profile/'.$dato->id,'Detalles') }}</span>
                </td>
            </tr>
            @empty
                <div class="alert alert-danger">No se encontraron DOCENTES. Agregar {{HTML::link('docente/add.html','aquí')}}</div>
            @endforelse

            </tbody>
        </table>
    <div class="row">
        <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
        <div class="col-sm-6">{{ $datos->links()}}</div>
        <div class="col-sm-4">{{ HTML::link('docente/add.html','Agregar Docente') }}</div>
    </div>
@stop
