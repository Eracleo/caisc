@extends('layouts.base_admin')
@section('title')
Modalidad de pago
@stop
@section('options')
<li >{{ HTML::link('/modalidad','Todos') }}</li>
<li>{{ HTML::link('/modalidad/create','Nuevo') }}</li>
@stop
@section('content')
    		<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Concepto</th>
						<th>Monto (S/.)</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($modalidad as $mod)
						<tr>
							<td>{{ $mod->id }}</td>
							<td>{{ $mod->descripcion }}</td>
							<td>{{ $mod->monto }}</td>
							<td>
								<a href="modalidad/show/{{ $mod->id}}"><span class="label label-success">Mostrar</span></a>
								<a href="modalidad/edit/{{ $mod->id}}"><span class="label label-info">Editar</span></a>
								<a href="{{ url('modalidad/destroy',$mod->id) }}"><span class="label label-danger">Borrar</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
