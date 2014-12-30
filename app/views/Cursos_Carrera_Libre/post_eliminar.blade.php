@extends('layouts.base_admin')
@section('title')
Eliminar <small>{{$curso_cl->nombre}}  </small>
@stop
@section('options')
<li>{{ HTML::link('CursosLibres/index.html','Listar') }}</li>
<li>{{ HTML::link('CursosLibres/create.html','Nuevo') }}</li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'CursosLibres/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
	{{ Form::label('LABEL','ESTA SEGURO DE ELIMINAR ESTE CURSO:',array('class'=>'col-sm-4 control-label')) }}
	</div>
	<div class="form-group">
		{{ Form::label('id','Codigo del Curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('id',$curso_cl->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('nombre',$curso_cl->nombre,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::number('horas_academicas',$curso_cl->horas_academicas,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('CursosCarreraLibreController@listar', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>

		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop
