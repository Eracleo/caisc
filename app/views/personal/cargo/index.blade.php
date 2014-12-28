@extends('layouts.base_admin')
@section('title')
Lista de cargos <small></small>
@stop
@section('options')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/cargos','Listar Cargos')}} </li>
<li>{{ HTML::link('personal/cargos/add.html','Nuevo Cargos')}} </li>
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
    	@foreach( $cargos as $cargo)
    	<tr class="odd">
                <td class=" ">{{ HTML::link('docente/profile/'.$cargo->id,$cargo->id) }}</td>
                <td class=" ">{{ $cargo->nombre }}</td>
                <td class=" ">{{ $cargo->privilegios }}</td>
                <td class=" ">{{ $cargo->descripcion }}</td>
                <td class=" ">
                	{{ HTML::link('docente/edit/'.$cargo->id,'Actualizar') }}
                	{{ HTML::link('docente/delete/'.$cargo->id,'Eliminar') }}
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop
