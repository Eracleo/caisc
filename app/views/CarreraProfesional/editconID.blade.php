@extends('layouts.base_admin')
@section('title')
Actualizar Carrera Profesional: <small> {{$carrera->nombre}} </small>
@stop
@section('options')
<li>{{HTML::link('CarreraProfesional','Listar')}}</li>
<li>{{HTML::link('CarreraProfesional/add.html','Nueva Carrera')}}</li>
@stop
@section('content')
<div class="col-xs-12 col-sm-12">
{{ Form::open(array('method'=> 'POST','url'=> 'CarreraProfesional/post_update.html','class'=>'form-horizontal','role'=>'form')) }}
	<div class="form-group">
		{{ Form::label('id','ID:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('id',Carrera::find($carrera->id)->id,array('class'=>'form-control','placeholder'=>'','readonly'=>'readonly'))}}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nombre','Nombre Carrera',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('nombre',$carrera->nombre,array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('nombre'))
		       	@foreach ($errors->get('nombre') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('descripcion','Descripcion:',array('class'=>'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('descripcion',$carrera->descripcion,array('class'=>'form-control','placeholder'=>''))}}
		</div>
		<div class="errores">
			@if ( $errors->has('descripcion'))
		       	@foreach ($errors->get('descripcion') as $error)
			   	<div class="alert alert-danger">* {{ $error }}</div>
		    	@endforeach
			@endif
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-xs-12 col-sm-3">
			{{HTML::linkAction('CarreraProfesionalController@index', 'Cancelar','',array('class'=>'col-sm-12 btn btn-warning'))}}
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
		</div>
	</div>
{{Form::close()}}
</div>
@stop
