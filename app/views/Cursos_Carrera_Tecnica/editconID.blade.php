@extends('layouts.base_admin')
@section('title')
Actualizar <small> {{$curso_ct->nombre}} </small>
@stop
@section('options')
<li>{{HTML::link('CursosTecnica/index.html','Listar')}}</li>
<li>{{HTML::link('CursosTecnica/create.html','Nuevo')}}</li>
<li><a href="#">Actualizar Curso</a></li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'CursosTecnica/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','Codigo del Curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('id',$curso_ct->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::text('nombre',$curso_ct->nombre,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8 col-md-6">
			{{ Form::select('modulo',$modulo,null,array('class'=>'form-control','required'))}}
		</div>
			<br>
		<span class = "label label-danger"> {{ HTML::link('modulo/nuevo.html',' Agregar Modulo') }}</span>
		
	</div>
		<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-6">
			{{ Form::number('horas_academicas',$curso_ct->horas_academicas,array('class'=>'form-control','placeholder'=>'1','required'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8 col-md-6">
			{{ Form::select('codCarrera',$carrera,null,array('class'=>'form-control','required'))}}
		</div>

		<br>
		<span class = "label label-danger"> {{ HTML::link('CarreraProfesional/add.html',' Agregar Carrera') }}</span>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-info btn-block" type="reset">Limpiar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
