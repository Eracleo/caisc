@extends('layouts.base_admin')
@section('title')
Actualizar Curso Libre : <small> {{$curso_cl->nombre}} </small>
@stop

@section('breadcrumb')
<li>Cursos Libres</li>
<li>Actualizar Curso</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'CursosLibres/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','Nro curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$curso_cl->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codigo','Codigo curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codigo',$curso_cl->codigo,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre',$curso_cl->nombre,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('horas_academicas',$curso_cl->horas_academicas,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
