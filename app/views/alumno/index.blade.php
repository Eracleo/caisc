@extends('layouts.base_admin')
@section('title')
Lista de Alumnos
@stop
@section('breadcrumb')
@stop
@section('options')
@stop
@section('content')
    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th colspan="1" rowspan="1">Cod Alumno</th>
                <th colspan="1" rowspan="1">Apellidos y Nombres</th>
                <th colspan="1" rowspan="1">Carrera Tecnica</th>
                <th colspan="1" rowspan="1">DNI</th>
                <th colspan="1" rowspan="1">Estado</th>
                <th colspan="1" rowspan="1">Acciones</th>
            </tr>
        </thead>
        <tbody aria-relevant="all" aria-live="polite" role="alert">
            @foreach( $datos as $dato)
            <tr class="odd">
                    <td class=" ">{{ $dato->id }}</td>
                    <td class=" "><b>{{ $dato->apellidos }}</b> {{ $dato->nombre }}</td>
                    <td class=" ">{{ $dato->carr }}</td>
                    <td class=" ">{{ $dato->dni }}</td>
                    <td class=" ">
                    <?php if($dato->estado == 0 ) { ?> Desactivo
                    <?php } else{ ?>Activo<?php } ?>
                    </td>
                    <td class=" ">
                        <span class="label label-success">{{ HTML::link('alumno/edit/'.$dato->id,' Modificar ') }}</span>
                         <span class="label label-warning"> {{ HTML::link('alumno/profile/'.$dato->id,' Detalles ') }}</span>
                         <span class="label label-danger">
                        <?php if($dato->estado == 0 ) { ?>{{ HTML::link('alumno/habilitar/'.$dato->id,' Habilitar') }}
                        <?php } else{ ?>{{ HTML::link('alumno/deshabilitar/'.$dato->id,' Deshabilitar') }}<?php } ?>
                         </span>
                         <span class="label label-primary">{{ HTML::link('alumno/change-pass/'.$dato->id,' Cambiar Contraseña') }}</span>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div class="row">
        <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
        <div class="col-sm-6">{{ $datos->links()}}</div>
        <div class="col-sm-4">{{ HTML::link('alumno/add.html','Agregar Alumno') }}</div>
    </div>
@stop
