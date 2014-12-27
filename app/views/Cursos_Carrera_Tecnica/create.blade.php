@extends('layouts.base_admin')
@section('title')
Agregar <small> CURSO DE CARRERA </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'CursosTecnica/insert.html','class'=>'form-horizontal','role'=>'form')) }}

	<div class="form-group">
		{{ Form::label('id','Codigo del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('id','',array('class'=>'form-control','placeholder'=>'isc-01', 'required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del Curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Programacion en Android','required'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8 col-md-6">
			{{ Form::select('modulo',$modulo,null,array('class'=>'form-control','required'))}}
			{{HTML::link('','Agregar Modulo') }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('horas_academicas','',array('class'=>'form-control','placeholder'=>'1','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8 col-md-6">
			{{ Form::select('codCarrera',$carrera,null,array('class'=>'form-control','required'))}}
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-info btn-block" type="reset" >Limpiar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
