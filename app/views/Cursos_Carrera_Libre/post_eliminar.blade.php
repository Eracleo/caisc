@extends('layouts.base_admin')
@extends('layouts.base_admin')
@section('title')
Eliminar <small>CURSOS LIBRES </small>
@stop
@section('breadcrumb')
<li>Cursos Libres</li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'CursosLibres/eliminar.html','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('id','Esta seguro de eliminar este curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$curso_cl->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codigo','Codigo del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codigo',$curso_cl->codigo,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre',$curso_cl->nombre,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('horas_academicas',$curso_cl->horas_academicas,array('class'=>'form-control','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset"> {{ HTML::link('CursosLibres/index.html','Cancelar') }}</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop