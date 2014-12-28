@extends('layouts.base_admin')
@section('title')
Actualizar Carrera Profesional: <small> {{$carrera->nombre}} </small>
@stop

@section('breadcrumb')
<li>Carreras Profesionales</li>
<li>Actualizar Carrera Profesional</li>
@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'CarreraProfesional/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('nombre','Nombre Carrera',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre',$carrera->nombre,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('descripcion',$carrera->descripcion,array('class'=>'form-control','placeholder'=>''))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('id','ID:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('id',Carrera::find($carrera->id)->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
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
