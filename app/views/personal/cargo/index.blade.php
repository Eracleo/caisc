@extends('layouts.base_admin')
@section('title')
Lista de cargos <small></small>
@stop
@section('options')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/cargos','Listar Cargos')}} </li>
<li>{{ HTML::link('personal/cargo/add.html','Nuevo Cargos')}} </li>
@stop
@section('content')
    <table class="table table-bordered table-striped dataTable">
        <thead>
            <tr role="row">
                <th colspan="1" rowspan="1" >Id</th>
                <th colspan="1" rowspan="1" >Nombre</th>
                <th colspan="1" rowspan="1" >Privilegios</th>
                <th colspan="1" rowspan="1" >Descripción</th>
                <th colspan="1" rowspan="1" >Actions</th>
            </tr>
        </thead>
        <tbody aria-relevant="all" aria-live="polite" role="alert">
        @forelse( $cargos as $cargo)
        <tr class="odd">
                @if($cargo->estado)
                <td>{{ HTML::link('personal/cargo/'.$cargo->id,$cargo->id) }}</td>
                @else
                <td class=" ">{{ HTML::link('personal/cargo/'.$cargo->id,$cargo->id) }}</td>
                @endif
                <td class=" ">{{ $cargo->nombre }}</td>
                <td class=" ">{{ $cargo->privilegios }}</td>
                <td class=" ">{{ $cargo->descripcion }}</td>
                <td class=" ">
                    <span class="label label-warning">{{ HTML::link('personal/cargo/edit/'.$cargo->id,'Actualizar') }}</span>
                    @if($cargo->estado)
                    <span class="label label-danger">{{ HTML::link('personal/cargo/delete/'.$cargo->id,'Eliminar') }}</span>
                    @else
                    <span class="label label-primary">{{ HTML::link('personal/cargo/active/'.$cargo->id,'Activar') }}</span>
                    @endif
                </td>
        </tr>
        @empty
                <div class="alert alert-danger">No se encontraron CARGOS. Agregar {{HTML::link('personal/cargo/add.html','aquí')}}</div>
        @endforelse
        </tbody>
    </table>
@stop
