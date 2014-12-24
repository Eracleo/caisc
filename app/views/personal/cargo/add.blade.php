@extends('layouts.base_admin')
@section('title')
Agregar Cargo <small> NUEVO CARGO</small>
@stop
@section('breadcrumb')
<li>{{ HTML::link('personal','Personal')}} </li>
<li>{{ HTML::link('personal/cargos','Cargos')}} </li>
<li>Agregar</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
{{ Form::open(array('method'=> 'POST','url'=> 'personal/cargo/insert.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('nombre','Nombre:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('nombre','',array('class'=>'form-control','placeholder'=>'Tesorera'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('privilegios','privilegios:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::text('privilegios','',array('class'=>'form-control','placeholder'=>'privilegio'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripción:',array('class'=>'col-sm-4 control-label')) }}
		<div class="col-sm-8">
			{{ Form::textarea('descripcion','',array('class'=>'form-control','placeholder'=>'Para personal autorizado'))}}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-info btn-block" type="reset">Cancelar</button>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<button class="btn btn-primary btn-block" type="submit">Guardar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
