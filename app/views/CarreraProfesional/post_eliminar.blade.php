@extends('layouts.base_admin')
@section('title')
Eliminar <small>CARRERA PROFESIONAL </small>
@stop
@section('options')
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'CarreraProfesional/delete','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('id','Esta seguro de eliminar esta carrera profesional:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-2">
			{{ Form::text('id',$carrera->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('nombre','Nombre de la carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-2">
			{{ Form::text('nombre',$carrera->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('decripcion',$carrera->descripcion,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-12 col-sm-4 col-md-2">
			{{HTML::linkAction('CarreraProfesionalController@index', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-4 col-md-2">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop
