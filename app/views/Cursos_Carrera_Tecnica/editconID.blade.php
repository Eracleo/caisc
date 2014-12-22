@extends('layouts.base_admin')
@section('title')
Actualizar Curso Tecnica : <small> {{$curso_ct->nombre}} </small>
@stop

@section('breadcrumb')
<li>Cursos Tecnicos</li>
<li>Actualizar Curso</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'CursosTecnica/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','Nro de curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$curso_ct->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('codigo','Codigo del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codigo',$curso_ct->codigo,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre del curso:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre',$curso_ct->nombre,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('modulo','Modulo:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('modulo',$curso_ct->modulo,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
		<div class="form-group">
		{{ Form::label('horas_academicas','Horas Academicas:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::number('horas_academicas',$curso_ct->horas_academicas,array('class'=>'form-control','placeholder'=>'1','required'))}}
		</div>
	</div>
	
	<div class="form-group">
		{{ Form::label('codCarrera','Carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('codCarrera',Carrera::find($curso_ct->codCarrera)->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
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
