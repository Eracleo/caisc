@extends('layouts.base_admin')
@section('title')
Agregar Cargo <small> NUEVO CARGO</small>
@stop
@section('options')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/cargos','Listar Cargos')}} </li>
<li>{{ HTML::link('personal/cargos/add.html','Nuevo Cargos')}} </li>
<li><a href="#">Agregar</a></li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'personal/cargo/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('nombre','Nombre:',array('class'=>'col-sm-2  control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Tesorera'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('nombre'))
		       	@foreach ($errors->get('nombre') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('privilegios','privilegios:',array('class'=>'col-sm-2  control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('privilegios','',array('class'=>'form-control','placeholder'=>'privilegio'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('privilegios'))
		       	@foreach ($errors->get('privilegios') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripción:',array('class'=>'col-sm-2  control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>'Para personal autorizado'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-6 col-md-3">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-sm-6 col-md-3">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
