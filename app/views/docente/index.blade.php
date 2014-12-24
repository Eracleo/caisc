@extends('layouts.base_admin')
@section('title')
Lista de Docentes
@stop
@section('breadcrumb')
<li>{{ HTML::link('docentes','Listar')}}</li>
<li>{{ HTML::link('docente/add.html','Agregar')}}</li>
@stop
@section('content')
<div class="box-body table-responsive">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
        <table aria-describedby="example1_info" id="example1" class="table table-bordered table-striped dataTable">
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
                    {{ HTML::link('docente/edit/'.$dato->id,'Actualizar') }}
                    @if($dato->estado)
                    {{ HTML::link('docente/delete/'.$dato->id,'Eliminar') }}
                    @else
                    {{ HTML::link('docente/active/'.$dato->id,'Activar') }}
                    @endif
                    {{ HTML::link('docente/profile/'.$dato->id,'Detalles') }}
                </td>
            </tr>
            @empty
                <div class="alert alert-danger">No se encontraron DOCENTES. Agregar {{HTML::link('docente/add.html','aquí')}}</div>
            @endforelse

            </tbody>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2"><p><b>Pagina Actual:</b> {{ $datos->getCurrentPage()}}</p></div>
        <div class="col-sm-6">{{ $datos->links()}}</div>
        <div class="col-sm-4">{{ HTML::link('docente/add.html','Agregar Docente') }}</div>
    </div>
    <hr>
</div><!-- /.box-body -->
@stop
