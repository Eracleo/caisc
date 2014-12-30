@extends('layouts.base_admin')
@section('title')
Agregar <small> CURSO LIBRE </small>
@stop
@section('options')
<li>{{ HTML::link('CursosLibres/index.html','Listar') }}</li>
<li>{{ HTML::link('CursosLibres/create.html','Nuevo') }}</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'CursosLibres/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','Codigo del curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('id','',array('class'=>'form-control','placeholder'=>'isc-01'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('id'))
		       	@foreach ($errors->get('id') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>

	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del Curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Programacion en Android'))}}
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
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::number('horas_academicas','',array('class'=>'form-control','placeholder'=>'35 horas academicas'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('horas_academicas'))
		       	@foreach ($errors->get('horas_academicas') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('CursosCarreraLibreController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>

		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
