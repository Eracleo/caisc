@extends('layouts.base_admin')
@section('title')
Lista alumno pago
@stop
@section('options')
<li >{{ HTML::link('/alumno','Todos') }}</li>
<li>{{ HTML::link('/alumno/create','Nuevo') }}</li>
@stop
@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Monto</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($alumnos as $mod)
				<tr>
					<td>{{ $mod->id }}</td>
					<td><b>{{ $mod->apellidos }}</b> {{ $mod->nombre }}</td>
					<td>{{ $mod->apellidos }}</td>
					<td>
						<a href="alumno/show/{{ $mod->id}}"><span class="label label-success">Mostrar</span></a>
						<a href="alumno/edit/{{ $mod->id}}"><span class="label label-info">Editar</span></a>
						<a href="{{ url('alumno/destroy',$mod->id) }}"><span class="label label-danger">Borrar</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
