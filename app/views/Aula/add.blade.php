@extends('layouts.base_admin')
@section('title')
Agregar Nueva Aula <small> NUEVA AULA </small>
@stop
@section('options')
<li>{{HTML::link('Aula','Listar')}}</li>
<li>{{HTML::link('Aula/add.html','Nueva Aula')}}</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'Aula/insert.html','class'=>'form-horizontal','role'=>'form')) }}

	<div class="form-group">
		{{ Form::label('codAula','Codigo de Aula:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('codAula','',array('class'=>'form-control','placeholder'=>'IN202'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('codAula'))
		       	@foreach ($errors->get('codAula') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group ">
		{{ Form::label('capacidad','Capacidad:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-6 col-md-4">
			{{ Form::text('capacidad','',array('class'=>'form-control','placeholder'=>'30'))}}
		</div>
		<div class="errores">
			@if ( $errors->has('capacidad'))
		       	@foreach ($errors->get('capacidad') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('AulaController@index', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
