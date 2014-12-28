@extends('layouts.base_admin')
@extends('layouts.base_admin')
@section('title')
Eliminar <small>CARRERAS PROFESIONALES </small>
@stop
@section('breadcrumb')
<li>Carreras Profesionales</li>
@stop
@section('content')
{{ Form::open(array('method'=> 'POST','url'=> 'CarreraProfesional/delete','class'=>'form-horizontal','role'=>'form')) }}
<div class="form-group">
		{{ Form::label('id','Esta seguro de eliminar esta carrera profesional:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',$carrera->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('nombre','Nombre de la carrera:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre',$carrera->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('decripcion',$carrera->descripcion,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">{{ HTML::link('CarreraProfesional','Cancelar') }}</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Eliminar</button>
		</div>
	</div>
{{Form::close()}}
@stop