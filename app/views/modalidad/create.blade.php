@extends('layouts.base_admin')
@section('title')
Mantenimiento Modalidad
@stop
@section('options')
<li >{{ HTML::link('modalidad','Todos') }}</li>
<li>{{ HTML::link('modalidad/create','Nuevo') }}</li>
@stop
@section('content')
  		<div class="panel frm-sm">
  			<form method="post" action="store">
				<p>
					<label>Nombre:</label>
					<input type="text" name="id" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<label>Concepto:</label>
					<input type="text" name="descripcion" placeholder="Concepto" class="form-control" required>
				</p>
				<p>
					<label>Monto (S/.):</label>
					<input type="text" name="monto" placeholder="Monto" class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Guardar" class="btn btn-primary">
				</p>
			</form>
		</div>
		@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
@stop
